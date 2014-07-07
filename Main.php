<?php

    namespace IdnoPlugins\Subscriptions {

        use Idno\Core\Email;
        use Idno\Entities\ActivityStreamPost;
        use Idno\Entities\User;

        class Main extends \Idno\Common\Plugin
        {

            function registerEventHooks()
            {

                \Idno\Core\site()->template()->extendTemplate('account/settings/notifications/methods', 'subscriptions/settings');

                \Idno\Core\site()->addEventHook('saved', function (\Idno\Core\Event $event) {

                    if (!empty($event->data()['object'])) {

                        $object = $event->data()['object'];

                        if (!($object instanceof ActivityStreamPost)) {
                            /* @var Idno\Common\Entity $object ; */
                            $owner = $object->getOwner();

                            if ($users = User::get([], [], 9999)) {
                                //$email = new Email();
                                //$email->setSubject($object->getTitle());
                                //$email->setHTMLBodyFromTemplate('subscriptions/email', ['object' => $object, 'owner' => $owner]);
						        $title = implode(' ', array_slice(explode(' ', $object->getTitle()), 0, 10));
                                foreach ($users as $user) {
                                    if (!empty($user->email) && $user->email != $owner->email && $user->notifications['subscriptions'] != 'none') {
                                		$email = new Email();
                                        $email->setSubject($title);
                                        $email->setHTMLBodyFromTemplate('subscriptions/email', ['object' => $object, 'owner' => $owner]);
                                        $email->addTo($user->email);
                                        $email->send();
                                    }
                                }
                            }
                        }

                    }

                });
            }

        }

    }
