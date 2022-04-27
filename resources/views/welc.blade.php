  <meta charset="utf-8">
<?php
use AmoCRM\Client\AmoCRMApiClient;
function GetInfo()
{
    $apiClient = new AmoCRMApiClient("e91368c5-f73c-469a-bff6-b87c386e6002", "0bIrAS0p0j5BcBYhqp0qtUdO7y16US2d1WUFO06HEWB7wVw2mFZekL970OwijLAs", "http://anrsmix5.beget.tech");
    if (!isset($_GET['code'])) {
        $state = bin2hex(random_bytes(16));
        $_SESSION['oauth2state'] = $state;
        if (isset($_GET['button'])) {
          echo $apiClient->getOAuthClient()->getOAuthButton(
                    [
                        'title' => 'Установить интеграцию',
                        'compact' => true,
                        'class_name' => 'className',
                        'color' => 'default',
                        'error_callback' => 'handleOauthError',
                        'state' => $state,
                    ]
              );
              die;
            } else {
                $authorizationUrl = $apiClient->getOAuthClient()->getAuthorizeUrl([
                    'state' => $state,
                    'mode' => 'post_message',
                ]);
                header('Location: ' . $authorizationUrl);
                die;
            }
        } elseif (empty($_GET['state']) || empty($_SESSION['oauth2state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            unset($_SESSION['oauth2state']);
            exit('Invalid state');
        }
        
        /**
         * Ловим обратный код
         */
         $baseDomain = "anrsmir123.amocrm.ru";
        try {
            $oauth = $apiClient->getOAuthClient();
            $oauth->setBaseDomain("anrsmir123.amocrm.ru");
            $accessToken = $oauth->getAccessTokenByCode($_GET['code']);
            
        }
        catch (Exception $e)
        {
            header('Location: http://anrsmix5.beget.tech/');
            exit();
        }
        
        $ownerDetails = $apiClient->getOAuthClient()->getResourceOwner($accessToken);
        
        printf('Hello, %s!', $ownerDetails->getName);
        
    } 
session_start();
GetInfo();
?>