/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.programming4food.smssender;

import com.google.gson.Gson;
import com.twilio.sdk.TwilioRestClient;
import com.twilio.sdk.TwilioRestException;
import com.twilio.sdk.resource.factory.MessageFactory;
import com.twilio.sdk.resource.instance.Message;
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;

import java.util.ArrayList;
import java.util.List;
import spark.ResponseTransformer;

import static spark.Spark.*;

/**
 *
 * @author Chemasmas
 */
public class Main {
// Find your Account Sid and Token at twilio.com/console

    public static final String ACCOUNT_SID = System.getenv().get("ACCOUNT_SID");
    public static final String AUTH_TOKEN = System.getenv().get("AUTH_TOKEN");
    public static void main(String[] args) throws TwilioRestException {

        int maxThreads = 8;
        int minThreads = 2;
        int timeOutMillis = 30000;
        threadPool(maxThreads, minThreads, timeOutMillis);

        port(1234);

        get("/hello", (req, res) -> "Api Iniciada");

        post("/sendMSG", (req, res) -> {
            
            try
            {
                String numero = req.queryParams("numero");
                String oficio = req.queryParams("oficio");
                String cliente = req.queryParams("cliente");

                TwilioRestClient client = new TwilioRestClient(ACCOUNT_SID, AUTH_TOKEN);
                List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("Body", "El numero +" + cliente + " requiere tus servicios como " + oficio));
                params.add(new BasicNameValuePair("To", "+" + numero));
                params.add(new BasicNameValuePair("From", "+12563440285"));

                MessageFactory messageFactory = client.getAccount().getMessageFactory();
                Message message = messageFactory.create(params);
                System.out.println(message.getStatus());
                return "Exito";
            }
            catch(Exception ex)
            {
                ex.printStackTrace();
                return "Error";
            }
            
        },new JsonTransformer());
        System.out.println("Iniciada");
    }
}

class JsonTransformer implements ResponseTransformer {

    private Gson gson = new Gson();

    @Override
    public String render(Object model) {
        return gson.toJson(model);
        
    }

}
