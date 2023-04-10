import java.util.Date;

public class SciFiBook extends Book{
    private String theme;

    public SciFiBook(){super();} //default ctor

    public SciFiBook(Date rDate, Date iDate, double price, int isbn, 
    int id, String title, Publisher publisher, Author author, String theme){ //ctor
        super(rDate, iDate, price, isbn, id, title, publisher, author);
        this.theme = theme;
    }

    //getter and setter for theme

    public String getTheme() {
        return theme;
    }
    public void setTheme(String theme) {
        this.theme = theme;
    }
}