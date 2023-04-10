import java.util.Date;

public class Author {
    private String name;
    private Date birthDate;
    private String countryOfOrigin;
    private String shortBib;
    private int numOfBooks;

    public Author(){} //default ctor

    public Author(String name, Date birthDate, String origin, String shortBib, int numOfBooks){ //ctor
        this.name = name;
        this.birthDate = birthDate;
        this.countryOfOrigin = origin;
        this.shortBib = shortBib;
        this.numOfBooks = numOfBooks;
    }

    //getters and setters

    public String getName() {
        return name;
    }
    public Date getBirthDate() {
        return birthDate;
    }  
    public String getCountryOfOrigin() {
        return countryOfOrigin;
    }
    public String getShortBib() {
        return shortBib;
    }
    public int getNumOfBooks() {
        return numOfBooks;
    }

    public void setName(String name) {
        this.name = name;
    }
    public void setBirthDate(Date birthDate) {
        this.birthDate = birthDate;
    }
    public void setCountryOfOrigin(String countryOfOrigin) {
        this.countryOfOrigin = countryOfOrigin;
    }
    public void setShortBib(String shortBib) {
        this.shortBib = shortBib;
    }
    public void setNumOfBooks(int numOfBooks) {
        this.numOfBooks = numOfBooks;
    }
}
