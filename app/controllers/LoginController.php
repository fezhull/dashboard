
        <?php

        use Phalcon\Mvc\Controller;
        
        class LoginController extends Controller 
        {
        
            public function indexAction() 
            {
        
            }
        
            public function loginAction()
            {
        
                if ($this->request->isPost()) {
                    $firstname = $this->request->getPost("firstname");
                    $lastname = $this->request->getPost("lastname");
                }
        
                $success = Users::findFirst(
                    [
                    "firstname = :firstname: AND lastname= :lastname:",
                    'bind' => [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    ]
                    ]
                    );

                if ($success) {
                    echo ('Owesome you logged in successiful!!');
                } else {
                    echo "Sorry, the following problems were generated: ";
        
                    $messages = $user->getMessages();
        
                    foreach ($messages as $message) {
                        echo $message->getMessage(), "<br/>";
                    }
                }
        
                $this->view->disable();
            }
        
        }