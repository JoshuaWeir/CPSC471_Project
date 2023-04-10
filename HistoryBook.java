import java.util.Date;

public class HistoryBook extends Book{
    private String era;

    public HistoryBook(){super();} //default ctor

    public HistoryBook(Date rDate, Date iDate, double price, int isbn, 
    int id, String title, Publisher publisher, Author author, String era){ //ctor
        super(rDate, iDate, price, isbn, id, title, publisher, author);
        this.era = era;
    }

    //getter and setter for era

    public String getEra() {
        return era;
    }
    public void setEra(String era) {
        this.era = era;
    }
}
