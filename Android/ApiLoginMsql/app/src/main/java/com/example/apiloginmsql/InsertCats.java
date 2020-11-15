package com.example.apiloginmsql;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.app.DownloadManager;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

public class InsertCats extends AppCompatActivity implements Response.Listener<JSONObject>, Response.ErrorListener {

    //Instance activity elements
    EditText txtId, txtDesc;
    Spinner spnTaga, spnTagb, spnTagc;
    Button btnLimpiar, btnOk;

    //Implementación de objetos de Volley
    RequestQueue rq;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_insert_cats);

        //Reference activity elements
        txtId = findViewById(R.id.TxtId);
        txtDesc = findViewById(R.id.TxtDesc);
        spnTaga = findViewById(R.id.SpnTaga);
        spnTagb = findViewById(R.id.SpnTagb);
        spnTagc = findViewById(R.id.SpnTagc);
        btnLimpiar = findViewById(R.id.BtnClear);
        btnOk = findViewById(R.id.BtnOk);

        // Instantiate the RequestQueue.
        rq = Volley.newRequestQueue(this);

        //Buttons Listener
        btnLimpiar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Clear
                Limpiar();
            }
        });
        btnOk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Método para agregar registro a cats
                NewCats();
            }
        });

    }

    //Agrega un nuevo registro en la tabla cats
    private void NewCats() {

        //Construimos la url del servidor con los campos string necesarios
        String url = "http://sylkaventas.ddns.net/uome_insert_cats.php?id=" + txtId.getText() + "&desc=" + txtDesc.getText() + "&taga=tsta&tagb=tstb&tagc=tstc&notes=NA";

        //Jason Request
        JsonObjectRequest jrq = new JsonObjectRequest(Request.Method.GET,url,null, this, this);
        //Add Jason Rquest to Request Que
        rq.add(jrq);

    }

    @Override
    public void onErrorResponse(VolleyError error) {

        //Usr
        AlertDialog.Builder alerta = new AlertDialog.Builder(InsertCats.this);
        //alerta.setMessage(error.networkResponse.toString()).setTitle("Error").create().show();
        alerta.setMessage("No se pudo registrar CATS").setTitle("Error").create().show();

    }

    @Override
    public void onResponse(JSONObject response) {

        //Usr
        AlertDialog.Builder alerta = new AlertDialog.Builder(InsertCats.this);
        alerta.setMessage("Nuevo registro correcto").setTitle("CATS").create().show();

        //Clear Text
        Limpiar();

    }

    //Método para limpiar los cuadros de texto y reinciar estados
    private void Limpiar() {

        //EditText
        txtId.setText("");
        txtDesc.setText("");

    }
}