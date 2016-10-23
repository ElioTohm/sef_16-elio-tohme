#include <SPI.h>
#include <Ethernet.h>

// assign a MAC address for the ethernet controller.
byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED
};

//initialization for sensor
int pin = 0; 
int tempc = 0;
int samples[8]; 
int maxi = -100,mini = 100; 
int i;

// initialize the library instance:
EthernetClient client;

char server[] = "192.168.1.103";

unsigned long lastConnectionTime = 0;             // last time you connected to the server, in milliseconds
const unsigned long postingInterval = 60L * 1000L; // delay between updates, in milliseconds
// the "L" is needed to use long type numbers

void setup() {
  // start serial port:
  Serial.begin(9600);

  // give the ethernet module time to boot up:
  delay(1000);
  // start the Ethernet connection using a fixed IP address and DNS server:
  Ethernet.begin(mac);
  // print the Ethernet board/shield's IP address:
  Serial.print("My IP address: ");
  Serial.println(Ethernet.localIP());
}

void loop() {
  // if there's incoming data from the net connection.
  // send it out the serial port.  This is for debugging
  // purposes only:
  if (client.available()) {
    char c = client.read();
    Serial.write(c);
  }

  // if ten seconds have passed since your last connection,
  // then connect again and send data:
  if (millis() - lastConnectionTime > postingInterval) {
    httpRequest();
  }

}

// this method makes a HTTP connection to the server:
void httpRequest() {
  // close any connection before send a new request.
  // This will free the socket on the WiFi shield
  client.stop();
  double temp = getTemperature();
   
  // if there's a successful connection:
  if (client.connect(server, 80)) {
    Serial.println("connecting...");
    // send the HTTP GET request:
    client.println("GET /CrasProxy/API/v1/ArduinoProxy.php?senorType=thermal&value="+ String(temp) +" HTTP/1.1");
    client.println("Host: 192.168.1.103");
    client.println("User-Agent: arduino-ethernet");
    client.println("Connection: close");
    client.println();

    // note the time that the connection was made:
    lastConnectionTime = millis();
  } else {
    // if you couldn't make a connection:
    Serial.println("connection failed");
  }
}

double getTemperature ()
{
  for(i = 0;i<=7;i++)
  {  
    samples[i] = ( 5.0 * analogRead(pin) * 100.0) / 1024.0;
    tempc = tempc + samples[i];
    delay(100);
  }
  tempc = tempc/8.0;
  return tempc;
}
