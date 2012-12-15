/*********************************************************************
* Alexander Bukhta
* MMC_Arduino.ino
* 
* This program contacts the router which is connected to the arduino, 
* then awaits for for the client to connect. When connected, it checks 
* for what the client sends, which then determines which rotation it makes 
* to allow medicine to flow.
*********************************************************************/
//Include libraries for the added servo, ethernet shield, and ethernet connections
#include <Servo.h>
#include <Ethernet.h>
#include <SPI.h>

//Sets boolean values to false
boolean reading = false;

// Defines the servo for later use
Servo servoMain; 

//Sets up the connecting address for the client
byte ip[] = { 192, 168, 1, 103 };   
byte gateway[] = { 192, 168, 0, 1 }; 
byte subnet[] = { 255, 255, 255, 0 }; 
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
EthernetServer server = EthernetServer(80); 

// Initially sets up connections to the arduino 
void setup()
{
  //Sets the connecting serial run speed
   Serial.begin(9600);
   
   //Sets the connected servo to pin 
   servoMain.attach(8); 
  
   //Sets the connected LED pin lights to pins 2,3, and 4
   pinMode(2, OUTPUT);
   pinMode(3, OUTPUT);
   pinMode(4, OUTPUT);
   
   //Ethernet is initialized
   Ethernet.begin(mac);
  
   //Server is initialized
   server.begin();
   
   //The IP address is fed into the Seial port
  Serial.println(Ethernet.localIP());
   
}

//Loops until a connection is made
void loop()
{
  
  checkForClient();
}

/* Checks for a client, then if connection is made, checks for an 
*  inputted character, after which it executes a rotation according
*  to the inputted character */
void checkForClient()
{
  //Checks if the client is connected to the server
  EthernetClient client = server.available();

  //If client is established
  if (client) {

    //Set the standard parameters for the input
    boolean currentLineIsBlank = true;
    boolean sentHeader = false;

    //While the client is connected 
    while (client.connected()) 
    {
      //Given this client is connected to the server
      if (client.available()) 
      {
        //If no header has been generated yet
        if(!sentHeader)
        {
          //Generate a standard header for the print
          client.println("HTTP/1.1 200 OK");
          client.println("Content-Type: text/html");
          client.println("Access-Control-Allow-Origin: *\r\n");
          client.println();
          
          //Set that the header has been place
          sentHeader = true;
        }

        //Add variable c that will read the next inputted character
        char c = client.read();

        //If there is a space inputted, reading is halted
        if(reading && c == ' ') reading = false;
        
        //If there is a ?, begin reading for inputted characters
        if(c == '?') reading = true; 

        //If it is reading for inputted characters
        if(reading){
          
          //Prints the input character to ASCII in the c
          Serial.print(c);
          
          //Determines what to do based on the input
          switch (c) 
          {
             //In the first case, 1 will cause a rotation to medicine 1
            case '1':
              rotateMed(1, client);
              break;
            //In the second case, 2 will cause a rotation to medicine 2
            case '2':
              rotateMed(2, client);
              break;
          }
        }
        
        // Move on if at the end of the line
        if (c == '\n' && currentLineIsBlank)  
            break;
        
        // If at the end of the line, indicate
        if (c == '\n') 
        {
          currentLineIsBlank = true;
        }
        
        //Otherwise, not at the end of the line
        else if (c != '\r') 
        {
          currentLineIsBlank = false;
        }

      }
    }

    //Give browser time to receive data
    delay(1); 
    
    //Close the connection to the server
    client.stop(); 
  } 
}

/* This function rotates according to the value inputted to the 
 *  client and sets a series of led lights to indicate how much
 *  time until it returns to its standard postion */
void rotateMed(int type, EthernetClient client)
{

   //If receives 1, rotates to 0 position for 3 seconds, then returns
   if(type==1)
   {
     //Client prints that it is working
     
     //div, to center
     
     client.print("<label style='color:red'>Injecting Medication Type:");
     client.print(type);
     client.print("</label>");
     client.print("<br>");
     delay(1000);
     //Rotates from standard to 0 degree position
     servoMain.write(0);  
     
     //Rotates through lights every 1 second
     digitalWrite(2,HIGH);
     delay(1000);  
     digitalWrite(2,LOW);
     digitalWrite(3,HIGH);
     delay(1000);  
     digitalWrite(3,LOW);
     digitalWrite(4,HIGH);
     delay(1000);
     digitalWrite(4,LOW);
     
     //After 3 seconds, returns to the original position
     servoMain.write(90); 
   }
 
   //If receieved 2, rotates to 180 position for 3 seconds, then returns
   if(type==2)
   {
     //Client prints that it is working
     client.print("<label style='color:red'>Injecting Medication Type:");
     client.print(type);
     client.print("</label>");
     client.print("<br>");
     delay(1000);
     //Rotates from standard to 180 position
     servoMain.write(180);  
     
     //Rotates through lights every 1 second
     digitalWrite(2,HIGH);
     delay(1000);  
     digitalWrite(2,LOW);
     digitalWrite(3,HIGH);
     delay(1000);  
     digitalWrite(3,LOW);
     digitalWrite(4,HIGH);
     delay(1000);
     digitalWrite(4,LOW);
     
     //After 3 seconds, returns to the original position
     servoMain.write(90); 
   }
   
   //Client indicates that it is completed with the injection!
   client.print("<b>Completed!</b>");
   client.print("</br>");
   client.print("Redirecting in 3 seconds!");
   client.print("<script>setTimeout(function(){window.location='medication_history.php';},3000);  </script>");
}
