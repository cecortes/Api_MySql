package com.example.apiloginmsql;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.EditText;
import android.widget.TextView;

public class InsertActivity extends AppCompatActivity {

    //Global que recibe datos de otros activities
    public static final String nomSesion = "nomsesion";

    //Instance
    TextView txtSesion;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_insert);

        //Reference
        txtSesion = findViewById(R.id.TxtSesion);

        //Captura el valor recibido por PUTEXTRA en el textview
        String usrSesion = getIntent().getStringExtra("nomsesion");

        //Mostramos el nombre recibido de la sesión
        txtSesion.setText("Sesion: " + usrSesion);
    }
}