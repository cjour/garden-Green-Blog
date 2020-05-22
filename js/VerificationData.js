class VerificationData {

    constructor(dataToVerify){

        this.dataToVerify = dataToVerify;
        this.regex = "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$";
        
    }

    PassVerify(){

        if(this.dataToVerify.match(this.regex)){

            return true;

        } else {

            return false;
        }

    }

}