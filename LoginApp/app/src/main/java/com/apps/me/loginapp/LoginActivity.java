package com.apps.me.loginapp;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class LoginActivity extends AppCompatActivity {
    TextView signup_text;
    EditText email_txt,pass_txt;
    Button btnlogin;
    AlertDialog.Builder builder;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        email_txt=(EditText)findViewById(R.id.email);
        pass_txt=(EditText)findViewById(R.id.password);

        signup_text = (TextView) findViewById(R.id.sign_up);
        signup_text.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(LoginActivity.this,RegisterActivity.class));
            }
        });
        btnlogin = (Button)findViewById(R.id.login_button);
        btnlogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(email_txt.getText().toString().equals("")||pass_txt.getText().toString().equals("")){
                    builder=new AlertDialog.Builder(LoginActivity.this);
                    builder.setTitle("Something went wrong....");
                    builder.setMessage("Please fill all the fields....");
                    builder.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            dialog.dismiss();
                        }
                    });
                    AlertDialog alertDialog=builder.create();
                    alertDialog.show();


                }else{
                    BackgroundTask backgroundTask=new BackgroundTask(LoginActivity.this);
                    backgroundTask.execute("login",email_txt.getText().toString(),pass_txt.getText().toString());
                }

            }
        });
    }
}
