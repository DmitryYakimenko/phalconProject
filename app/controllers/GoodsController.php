<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use app\models\Goods;


class GoodsController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, '\app\models\Goods', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id_good";

        $goods = Goods::find($parameters);
        if (count($goods) == 0) {
            $this->flash->notice("The search did not find any goods");

            $this->dispatcher->forward([
                "controller" => "goods",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $goods,
            'limit'=> 5,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Searches for goods
     */
    public function searchAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a good
     *
     * @param string $id_good
     */
    public function editAction($id_good)
    {
        if (!$this->request->isPost()) {

            $good = Goods::findFirstByid_good($id_good);
            if (!$good) {
                $this->flash->error("good was not found");

                $this->dispatcher->forward([
                    'controller' => "goods",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id_good = $good->id_good;

            $this->tag->setDefault("id_good", $good->id_good);
            $this->tag->setDefault("name", $good->name);
            $this->tag->setDefault("img", $good->img);
            $this->tag->setDefault("id_good_type", $good->id_good_type);
            
        }
    }

    /**
     * Creates a new good
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "goods",
                'action' => 'index'
            ]);

            return;
        }

        $good = new Goods();
        $good->name = $this->request->getPost("name");
        $good->img = $this->request->getPost("img");
        $good->idGoodType = $this->request->getPost("id_good_type");
        

        if (!$good->save()) {
            foreach ($good->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "goods",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("good was created successfully");

        $this->dispatcher->forward([
            'controller' => "goods",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a good edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "goods",
                'action' => 'index'
            ]);

            return;
        }

        $id_good = $this->request->getPost("id_good");
        $good = Goods::findFirstByid_good($id_good);

        if (!$good) {
            $this->flash->error("good does not exist " . $id_good);

            $this->dispatcher->forward([
                'controller' => "goods",
                'action' => 'index'
            ]);

            return;
        }

        $good->name = $this->request->getPost("name");
        $good->img = $this->request->getPost("img");
        $good->idGoodType = $this->request->getPost("id_good_type");
        

        if (!$good->save()) {

            foreach ($good->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "goods",
                'action' => 'edit',
                'params' => [$good->id_good]
            ]);

            return;
        }

        $this->flash->success("good was updated successfully");

        $this->dispatcher->forward([
            'controller' => "goods",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a good
     *
     * @param string $id_good
     */
    public function deleteAction($id_good)
    {
        $good = Goods::findFirstByid_good($id_good);
        if (!$good) {
            $this->flash->error("good was not found");

            $this->dispatcher->forward([
                'controller' => "goods",
                'action' => 'index'
            ]);

            return;
        }

        if (!$good->delete()) {

            foreach ($good->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "goods",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("good was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "goods",
            'action' => "index"
        ]);
    }

}
