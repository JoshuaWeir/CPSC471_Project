public class ReturnOrder {
    private int regUserFlag;
    private int id;
    private double price;
    private String address;
    private ArrayList<Book> booksSold;

    // Constructor

    public ReturnOrder(int regUserFlag, int id, double price, String address, ArrayList<Book> booksSold) {
        this.regUserFlag = regUserFlag;
        this.id = id;
        this.price = price;
        this.address = address;
        this.booksSold = booksSold;
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

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public ArrayList<Book> getBooksSold() {
        return booksSold;
    }

    public void setBooksSold(ArrayList<Book> booksSold) {
        this.booksSold = booksSold;
    }
}
