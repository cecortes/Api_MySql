package com.example.apiloginmsql;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.NetworkResponse;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.JsonRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    //Globales
    String usr, pwd;

    //Instance activity elements
    EditText txtUsuario, txtPass;
    Button btnLogin;
    
    //Implementación de objetos de Volley
    RequestQueue rq;
    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //Reference activity elements
        txtUsuario = findViewById(R.id.TxtUsuario);
        txtPass = findViewById(R.id.TxtPass);
        btnLogin = findViewById(R.id.BtnLogin);

        // Instantiate the RequestQueue.
        rq = Volley.newRequestQueue(this);

        //Listener for button
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                //Capturamos los campos de texto
                usr = txtUsuario.getText().toString();
                pwd = txtPass.getText().toString();

                //Validamos los datos
               if (!usr.isEmpty() && !pwd.isEmpty()) {

                   //Método para iniciar sesión
                   IniciarSesion();

               } else {

                   //Usr
                   AlertDialog.Builder alerta = new AlertDialog.Builder(MainActivity.this);
                   alerta.setMessage("Los campos Usuario y Contraseña no pueden estar vacíos.").setTitle("Error").create().show();

               }

            }
        });
    }

    private void IniciarSesion() {

        //Construimos la url del servidor con los campos string necesarios
        String url = "http://sylkaventas.ddns.net/uome_sesssion.php?u=" + usr + "&p=" + pwd;
        //String url = "http://sylkaventas.ddns.net/uome_sesssion.php";

        //Jason Request
        JsonObjectRequest jrq = new JsonObjectRequest(Request.Method.GET,url,null, this, this);
        //Add Jason Rquest to Request Que
       rq.add(jrq);

    }

    @Override
    public void onErrorResponse(VolleyError error) {

        //Usr
        AlertDialog.Builder alerta = new AlertDialog.Builder(MainActivity.this);
        alerta.setMessage("Usuario y contraseña incorrectas").setTitle("Error").create().show();

        //Clear
        txtUsuario.setText("");
        txtPass.setText("");
    }

    @Override
    public void onResponse(JSONObject response) {

        //Objetos necesarios
        Usuarios usr = new Usuarios();
        JSONArray jsonArray = response.optJSONArray("sesion");
        JSONObject jsonObject = null;

        //Control de errores
        try {

            jsonObject = jsonArray.getJSONObject(0);

            //Captura del arreglo dentro del objeto usr
            usr.setUsr_nom(jsonObject.optString("usr_nom"));
            usr.setUsr_mail(jsonObject.optString("usr_mail"));
            usr.setUsr_pass(jsonObject.optString("usr_pass"));
            usr.setUsr_create(jsonObject.optString("usr_create"));

            //Usr
            //AlertDialog.Builder alerta = new AlertDialog.Builder(MainActivity.this);
            //alerta.setMessage(usr.getUsr_nom()).setTitle("Sesión").create().show();

            //Intent para el activity de insert
            Intent intent = new Intent(this, InsertCats.class);

            //Pasamos el parámetro de la sesion por medio de PUTEXTRA
            intent.putExtra(InsertActivity.nomSesion, usr.getUsr_nom());

            //Lanzamos la pantalla del InsertActivity
            startActivity(intent);

        } catch (JSONException e) {

            e.printStackTrace();

        }

    }

}