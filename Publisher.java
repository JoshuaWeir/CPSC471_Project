public class Publisher {
   private String name;
   private String address;
   private String contactInfo; 

   public Publisher(){} //default ctor

   public Publisher(String name, String address, String contactInfo){ //ctor
        this.name = name;
        this.address = address;
        this.contactInfo = contactInfo;
   }

   //getters and setters

   public String getName() {
       return name;
   }
   public String getAddress() {
       return address;
   }
   public String getContactInfo() {
       return contactInfo;
   }

   public void setName(String name) {
       this.name = name;
   }
   public void setAddress(String address) {
       this.address = address;
   }
   public void setContactInfo(String contactInfo) {
       this.contactInfo = contactInfo;
   }
}
