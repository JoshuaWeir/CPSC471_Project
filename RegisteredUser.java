import java.util.ArrayList;

public class RegisteredUser extends User{
    private int points;
    private String paymentMethod;
    private ArrayList<PurchaseOrder> purchaseOrders;
    private ArrayList<ReturnOrder> returnOrders;

    //default ctor
    public RegisteredUser(){
        super();
        this.points = 0;
        this.purchaseOrders = new ArrayList<PurchaseOrder>();
        this.returnOrders = new ArrayList<ReturnOrder>();
    }

    //ctor
    public RegisteredUser(int id, String n, String a, String un, String pw, String e, String bd, int p, String pm, 
        ArrayList<PurchaseOrder> po, ArrayList<ReturnOrder> ro){
        super(id, n, a, un, pw, e, bd);
        this.points = p;
        this.paymentMethod = pm;
        this.purchaseOrders = po;
        this.returnOrders = ro;
    }

    //getters
    public int getPoints(){ return this.points; }
    public String getPaymentMethods(){ return this.paymentMethod; }
    public ArrayList<PurchaseOrder> getPurchaseOrders(){ return this.purchaseOrders; }
    public ArrayList<ReturnOrder> getReturnOrders(){ return this.returnOrders; }
    //add methods to find orders based on id?

    //setters
    public void setPoints(int p){ this.points = p; }
    public void setPaymentMethods(String pm){ this.paymentMethod = pm; }
    public void setPurchaseOrders(ArrayList<PurchaseOrder> po){ this.purchaseOrders = po; }
    public void setReturnOrders(ArrayList<ReturnOrder> ro){ this.returnOrders = ro; }

    public void addPoints(int p){
        this.points += p;
    }

    public void removePoints(int p){
        this.points -= p;
    }

    public void addPurchase(PurchaseOrder p){
        this.purchaseOrders.add(p);
    }

    public void addReturn(ReturnOrder r){
        this.returnOrders.add(r);
    }
}
