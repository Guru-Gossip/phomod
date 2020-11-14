<?php

    class Controller extends model{

        public function getConnect(){
            $mainConnect = $this->dbconnection();
            return $mainConnect;
        }   

        public function pwdcon($email){
            return $this->getpwd($email);
        }

        public function resPwd($email){

        }

        public function sendDet($email){
            return $this->login($email);
        }

        public function indVer($email){
            return $this->indLog($email);
        }

        public function verify($verified, $user){
            return $this->verifyMethod($verified, $user);
        }

        public function feature($featured, $user){
            return $this->featureMethod($featured, $user);
        }

        public function resCode($email, $ver_code){
            $sendCode = $this->resetCode($email, $ver_code);
        }

        public function getCode($email, $code){
            $geCode = $this->verCode($email, $code);
            return $geCode;
        }

        public function newPass($email, $pass){
            $changePass = $this->updPass($email, $pass);
        }

        //CHECK IF USER IS A FREELANCER
        public function userDet($email){
            $senDet = $this->getDe($email);
            return $senDet;
        }

        //CHECK IF USER IS AN INDIVIDUAL
        public function indData($userid){
            $senInd = $this->geInd($userid);
            return $senInd;
        }

        //CHECK IF USER IS VERIFIED
        public function isVerified($checkUser){
            return $this->retVerified($checkUser);
        }

        //CREATE ACCOUNT FOR INDIVIDUAL USER
        public function createInd($userid, $email, $name, $pic){
            $sendData = $this->createAcc($userid, $email, $name, $pic);
        }

        public function convert($sessDet){
            $getSes = $this->dbconnection();
            $sessProf = 'SELECT USERNAME FROM freelancers WHERE PROFILE_ID = ?';
            $varSess = $getSes->prepare($sessProf);
            $varSess->execute([$sessDet]);
            if($varSess->rowCount() == 1){
                $getUserName = $varSess->fetchAll();
                //USER IS A FREELANCER
                foreach($getUserName as $newUserName){
                    $dispName = $newUserName['USERNAME'];
                }
            }
            else{
                //USER IS AN INDIVIDUAL
                //GET NAME WITH SESSION['LOG'];
                $indQue = 'SELECT NAME FROM individual WHERE PROFILE_ID = ?';
                $verInd = $getSes->prepare($indQue);
                $verInd->execute([$sessDet]);
                if($verInd->rowCount() == 1){
                    $indUserName = $verInd->fetchAll();
                    foreach($indUserName as $vidUserName){
                        $dispName = $vidUserName['NAME'];
                    }
                }
                else{
                    $dispName = 'error';
                }
            }
            $dispName = explode(" ", $dispName);
            $dispName = $dispName[0];
            return $dispName;
        }

        //CHECK IF USER IS FREELANCER OR INDIVIDUAL
        public function checkStatus($sessDet){
            $getSes = $this->dbconnection();
            $sessProf = 'SELECT USERNAME FROM freelancers WHERE PROFILE_ID = ?';
            $varSess = $getSes->prepare($sessProf);
            $varSess->execute([$sessDet]);
            if($varSess->rowCount() == 1){
               $stats = 'freelancer';
            }
            else{
                //USER IS AN INDIVIDUAL
                //GET NAME WITH SESSION['LOG'];
                $indQue = 'SELECT NAME FROM individual WHERE PROFILE_ID = ?';
                $verInd = $getSes->prepare($indQue);
                $verInd->execute([$sessDet]);
                if($verInd->rowCount() == 1){
                    $stats = 'individual';
                }
                else{
                    $stats = 'error';
                }
            }
            return $stats;
        }
        
        //ADD RATINGS
        public function addRate($lancer, $rater, $totVot){
            $senVot = $this->finVote($lancer, $rater, $totVot);
        }

        //SET EMAIL_CODE
        public function setEmailCode($email, $ver_code){
            $sql = "UPDATE freelancers SET EMAIL_CODE = ? WHERE EMAIL = ?";
            $stmt = $this->dbconnection()->prepare($sql);
            $stmt->execute([$ver_code, $email]);
        }

        //CHECK IF EMAIL IS IN FREELANCERS AND EMAIL_VERIFIED = 0
        public function isAcc($email, $code){
            $isAnew = $this->newAcc($email);
            if($isAnew -> rowCount() == 1){
                //PHASE ONE IS VALID
                //CHECK IF CODE MATCHES EMAIL VERIFY CODE
                while($getCode = $isAnew->fetch()){
                    $thenCode = $getCode['EMAIL_CODE'];
                    if($code == $thenCode){
                        //LET EMAIL = VERIFIED
                        $email_ver = "UPDATE freelancers SET EMAIL_VERIFIED = 'YES' WHERE EMAIL = ?";
                        $stmt_ver = $this->dbconnection()->prepare($email_ver);
                        $stmt_ver->execute([$email]);
                        //THEN CODE IS VALID
                        return true;
                    }
                }
            }
        }
    }