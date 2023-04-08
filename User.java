import java.lang.String;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

public class User {
    private int ID;
    private String name;
    private String address;
    private String username;
    private String password;
    private String email;
    private LocalDate birthday;

    //default ctor
    public User(){}

    //ctor
    //bd formatted as "dd-MM-yyyy"
    public User(int id, String name, String address, String username, String password, String email, String bd){
        this.ID = id;
        this.name = name;
        this.address = address;
        this.username = username;
        this.password = password;
        this.email = email;
        this.birthday = LocalDate.parse(bd, DateTimeFormatter.ofPattern("dd-MM-yyyy"));
    }
    //getters
    public int getID(){ return this.ID; }
    public String getName(){ return this.name; }
    public String getAddress() { return this.address; }
    public String getUsername() { return this.username; }
    public String getPassword() { return this.password; }
    public String getEmail() { return this.email; }
    public String getBirthString(){ return this.birthday.toString(); }
    public LocalDate getBirthDate() { return this.birthday; }
    //setters
    public void setID(int id){ this.ID = id; }
    public void setName(String n){ this.name = n; }
    public void setAddress(String a){ this.address = a; }
    public void setUsername(String un){ this.username = un; }
    public void setPassword(String pw){ this.password = pw; }
    public void setEmail(String e){ this.email = e; }
    public void setBirthString(String bd){ 
        //bd string format as "dd-MM-yyyy"
        this.birthday = LocalDate.parse(bd, DateTimeFormatter.ofPattern("dd-MM-yyyy"));
    }
    public void setBirthDate(LocalDate bd){ this.birthday = bd; }

    //add login
    //add register

}