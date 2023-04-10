import java.util.Date;

public class OtherBook extends Book{
    private String genre;

    public OtherBook(){super();} //default ctor

    public OtherBook(Date rDate, Date iDate, double price, int isbn, 
    int id, String title, Publisher publisher, Author author, String genre){ //ctor
        super(rDate, iDate, price, isbn, id, title, publisher, author);
        this.genre = genre;
    }

    //getter and setter for genre

    public String getGenre() {
        return genre;
    }
    public void setGenre(String genre) {
        this.genre = genre;
    }
}