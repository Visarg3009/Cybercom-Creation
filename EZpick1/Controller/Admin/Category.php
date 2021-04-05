<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class Category extends \Controller\Core\Admin
{
    public function gridAction() {
        try{
            $grid = \Mage::getBlock('Block\Admin\Category\Grid');
            $contentHtml = $grid->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                    'selector' => '#contentHtml',
                    'html' => $contentHtml
                    ],
                ]
            ];

            header('Content-Type:application/json');
            echo json_encode($response);

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        } 
    }

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('Block\Admin\Category\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $category = \Mage::getModel('Model\Category');
            if ($id) {    
                $category = $category->load($id);
                if (!$category) {
                    throw new \Exception("No category Found!");
                }
            }
            $form->setTableRow($category);
            $contentHtml = $form->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $contentHtml
                    ]
                ]
            ];

            header('Content-Type:application/json');
            echo json_encode($response);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction() {
        try {
            $category = \Mage::getModel('Model\Category');
            
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            if ($category_Id = $this->getRequest()->getGet('id')) {
               $category =  $category->load($category_Id);
               if(!$category){
                throw new \Exception("Unable to Load data.");
               }
            }
            $categoryPathId = $category->path;

            $categoryData = $this->getRequest()->getPost('category');
            $category->setData($categoryData);
            $category->save();

            $category->updatePathId();
            $category->updateChildrenPathIds($categoryPathId);
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $category = \Mage::getModel('Model\Category');  
            $category_Id = (int) $this->getRequest()->getGet('id');

            if (!$category_Id) {
                throw new \Exception("Id is required");
            }

            if ($category_Id) {
                $category =  $category->load($category_Id); 
                if(!$category){
                 throw new \Exception("Unable to Load data.");
                }
            }
            
            $categoryPath = $category->path;
            $categoryParentId = $category->parent_Id;
            $category->updateChildrenPathIds($categoryPath,$category_Id,$categoryParentId);
            $category->delete($category_Id);
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }  
}