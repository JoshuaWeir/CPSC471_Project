import java.util.Date;

public class Book{
    private Date releaseDate;
    private Date inventoryDate;
    private double price;
    private int ISBN;
    private int ID;
    private String title;
    private Publisher publisher;
    private Author author;

    public Book(){} //default ctor

    public Book(Date rDate, Date iDate, double price, int isbn, 
        int id, String title, Publisher publisher, Author author){ //ctor
            this.releaseDate = rDate;
            this.inventoryDate = iDate;
            this.price = price;
            this.ISBN = isbn;
            this.ID = id;
            this.title = title;
            this.publisher = publisher;
            this.author = author;
        }

        //setters and getters
    
        public Date getReleaseDate() {
            return releaseDate;
        }
        public Date getInventoryDate() {
            return inventoryDate;
        }
        public double getPrice() {
            return price;
        }
        public int getISBN() {
            return ISBN;
        }
        public int getID() {
            return ID;
        }
        public String getTitle() {
            return title;
        }
        public Publisher getPublisher() {
            return publisher;
        }
        public Author getAuthor() {
            return author;
        }

        public void setReleaseDate(Date releaseDate) {
            this.releaseDate = releaseDate;
        }
        public void setInventoryDate(Date inventoryDate) {
            this.inventoryDate = inventoryDate;
        }
        public void setPrice(double price) {
            this.price = price;
        }
        public void setISBN(int iSBN) {
            ISBN = iSBN;
        }
        public void setID(int iD) {
            ID = iD;
        }
        public void setTitle(String title) {
            this.title = title;
        }
        public void setPublisher(Publisher publisher) {
            this.publisher = publisher;
        }
        public void setAuthor(Author author) {
            this.author = author;
        }
}