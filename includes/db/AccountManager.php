<?php

    require('Database.php');

    class AccountManager
    {
        public $db;

        public function __construct()
        {
            $this->db = new Database();
        }

             public function login($email, $pwd)
        {
          $result = $this->db->prepare("SELECT * FROM users WHERE email = ?");
          $result->execute([$email]);

          if($user = $result->fetch())
          {
            if(strcmp($pwd, $user['password']) == 0)
            {
              $user['type'] = 0;
               return $user;
            }
          }

          $result = $this->db->prepare('SELECT * FROM admin WHERE email = ? and password = ?');
          $result->execute(array($email, $pwd));

          if($user = $result->fetch())
          {
              $user['type'] = 1;
              return $user;
          }

          return [];
        }


        public function sign_up($name, $surname, $email, $pwd)
        {
            $result = $this->db->prepare('INSERT INTO users(name, surname, email, password) VALUES(:name, :surname, :email, :password)');
            $result->execute(array(
              'name' => $name,
              'surname' => $surname,
              'email' => $email,
              'password' => $pwd
            ));
        }


        public function printUserTable()
        {
            $result = $this->db->query('SELECT * FROM users');
            ?>
            <ul>
            <?php
            while ($data = $result->fetch())
            {
                ?>

                <li><?php echo $data['name'] . ' ' . $data['surname']; ?></li>

                <?php
            }

            ?>
            </ul>
            <?php
            $result->closeCursor();
        }


  			public function printMessages($user_1_id)
    		{
      			$result = $this->db->query('SELECT * FROM messages');
      			$result2 = $this->db->query('SELECT u.name, u.surname FROM users u join messages m where u.id = m.sender_id ');				  

      			while ($data = $result->fetch() and $data2 = $result2->fetch() )
      			{
					if($user_1_id == $data['sender_id']){
						
						echo '<div class="container-darker">';
						echo '<div class="text-left">';
						echo '<b>'. $data2['name'].' '.$data2['surname'].' : </b>'. $data['message'] . ' <br>';
						echo '</div>';
						echo '</div>';
					}
					else{

						echo '<div class="container-lighter">';
						echo '<b>'. $data2['name'].' '.$data2['surname'].' : </b>'. $data['message'] . ' <br>';
						echo '</div>';
					}
					
					
      			}

      			$result->closeCursor();
    		}

    		public function WriteMessage($message,$sender_id)
    		{
      			$req = $this->db->prepare('INSERT INTO messages(message, sender_id) VALUES(:message, :sender_id)');
      			$req->execute(array(
      			  'message' => $message,
      			  'sender_id' => $sender_id,
      			  ));
    		}
    }

?>
