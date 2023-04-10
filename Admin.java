public class Admin extends User {
    //default ctor
    public Admin(){
        super();
    }

    //ctor
    public Admin(int id, String n, String a, String un, String pw, String e, String bd){
        super(id, n, a, un, pw, e, bd);
    }

    public void addBookToInventory(Book b){
        //add code
    }

    public void removeBookFromInventory(Book b){
        //add code
    }

    public void modifyBookInInventory(Book b){
        //add code
    }

    public void removeUser(RegisteredUser user){
        //add code
    }

}
