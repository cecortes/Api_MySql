package com.example.apiloginmsql;

public class Usuarios {

    //Atributos
    int usr_id;
    String usr_nom;
    String usr_mail;
    String usr_pass;
    String usr_create;

    //Constructor
    /*
    public Usuarios(String usr_nom, String usr_mail, String usr_pass, String usr_create) {
        this.usr_nom = usr_nom;
        this.usr_mail = usr_mail;
        this.usr_pass = usr_pass;
        this.usr_create = usr_create;
    }
    */

    //Get & Set


    public String getUsr_nom() {
        return usr_nom;
    }

    public void setUsr_nom(String usr_nom) {
        this.usr_nom = usr_nom;
    }

    public String getUsr_mail() {
        return usr_mail;
    }

    public void setUsr_mail(String usr_mail) {
        this.usr_mail = usr_mail;
    }

    public String getUsr_pass() {
        return usr_pass;
    }

    public void setUsr_pass(String usr_pass) {
        this.usr_pass = usr_pass;
    }

    public String getUsr_create() {
        return usr_create;
    }

    public void setUsr_create(String usr_create) {
        this.usr_create = usr_create;
    }
}
