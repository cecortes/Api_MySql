package com.example.apiloginmsql;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

public class InsertTags extends AppCompatActivity implements Response.Listener<JSONObject>, Response.ErrorListener {

    //Instance activity elements
    EditText txtTag;
    Button btnClear, btnOk;

    //Implementación de objetos de Volley
    RequestQueue rq;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_insert_tags);

        //Reference activity elements
        txtTag = findViewById(R.id.TxtTag);
        btnClear = findViewById(R.id.BtnClearTag);
        btnOk = findViewById(R.id.BtnOkTag);

        // Instantiate the RequestQueue.
        rq = Volley.newRequestQueue(this);

        //Buttons listener
        btnOk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Método para agregar registro a cats
                NewTags();
            }
        });
        btnClear.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Limpiar campos
                Limpiar();
            }
        });
    }

    //Agrega un nuevo registro en la tabla tags
    private void NewTags() {

        //Construimos la url del servidor con los campos string necesarios
        String url = "http://sylkaventas.ddns.net/uome_insert_tags.php?tag=" + txtTag.getText();

        //Jason Request
        JsonObjectRequest jrq = new JsonObjectRequest(Request.Method.GET,url,null, this, this);
        //Add Jason Rquest to Request Que
        rq.add(jrq);

    }

    //Método para limpiar los cuadros de texto y reinciar estados
    private void Limpiar() {
        //EditText
        txtTag.setText("");
    }

    @Override
    public void onErrorResponse(VolleyError error) {

        //Usr
        AlertDialog.Builder alerta = new AlertDialog.Builder(InsertTags.this);
        //alerta.setMessage(error.networkResponse.toString()).setTitle("Error").create().show();
        alerta.setMessage("No se pudo registrar TAGS").setTitle("Error").create().show();

    }

    @Override
    public void onResponse(JSONObject response) {

        //Usr
        AlertDialog.Builder alerta = new AlertDialog.Builder(InsertTags.this);
        alerta.setMessage("Nuevo TAG correcto").setTitle("TAGS").create().show();

        //Clear Text
        Limpiar();

    }
}