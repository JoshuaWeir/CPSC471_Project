public class PurchaseOrder {
    private int regUserFlag;
    private int id;
    private double price;
    private Credit credit;
    private ArrayList<Book> booksReturned;

    // Constructor

    public PurchaseOrder(int regUserFlag, int id, double price, Credit credit, ArrayList<Book> booksReturned) {
        this.regUserFlag = regUserFlag;
        this.id = id;
        this.price = price;
        this.credit = credit;
        this.booksReturned = booksReturned;
    }
    // Getters and Setters

    public int getRegUserFlag() {
        return regUserFlag;
    }

    public void setRegUserFlag(int regUserFlag) {
        this.regUserFlag = regUserFlag;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public Credit getCredit() {
        return credit;
    }

    public void setCredit(Credit credit) {
        this.credit = credit;
    }

    public ArrayList<Book> getBooksReturned() {
        return booksReturned;
    }

    public void setBooksReturned(ArrayList<Book> booksReturned) {
        this.booksReturned = booksReturned;
    }
}
