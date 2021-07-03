#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

const char *ssid = "Mr Gold";
const char *pass = "mjavi101";

//Domain name and URL path
String serverName = "http://192.168.0.86/hit_api/public/index.php/api/bio_data/";

WiFiClient client;

SoftwareSerial mySerial(D7, D8);


Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

uint8_t id;

void setup()
{
  Serial.begin(9600);
  while (!Serial);  // For Yun/Leo/Micro/Zero/...
  delay(500);
  WiFi.begin(ssid, pass);
  while(WiFi.status() != WL_CONNECTED)
    {
      delay(500);
    }
  // set the data rate for the sensor serial port
  finger.begin(0x12345678);
  finger.begin(57600);
  
  delay(5);
  if (finger.verifyPassword()) {
    Serial.println("Found fingerprint sensor!");
  } else {
    Serial.println("Did not find fingerprint sensor :(");
    while (1) { delay(1); }
  }

  //Serial.println(F("Reading sensor parameters"));
  finger.getParameters();
  

  finger.getTemplateCount();

  if (finger.templateCount == 0) {
    //Serial.print("Sensor doesn't contain any fingerprint data. Please run the 'enroll' example.");
  }
  else {
    //Serial.println("Waiting for valid finger...");
      //Serial.print("Sensor contains "); Serial.print(finger.templateCount); Serial.println(" HIT Students");
  }
}

void loop()                     // run over and over again
{
  getFingerprintID();
  delay(0);            //don't ned to run this at full speed.
}

uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      //Serial.println("No Student detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      //Serial.println("Imaging error");
      return p;
    default:
      //Serial.println("Unknown error");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      //Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      //Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      //Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      //Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      //Serial.println("Could not find fingerprint features");
      return p;
    default:
      //Serial.println("Unknown error");
      return p;
  }

  // OK converted!
  p = finger.fingerSearch();
  if (p == FINGERPRINT_OK) {
    //Serial.println("Found a print match!");

  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    //Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println(0);
    if(WiFi.status()== WL_CONNECTED){
     HTTPClient http;
     String serverPath = serverName + "0";
     http.begin(client, serverPath.c_str());
     int httpResponseCode = http.GET();
    }
    return p;
  } else {
    //Serial.println("Unknown error");
    return p;
  }

  // found a match!
  Serial.println(finger.fingerID);
  if(WiFi.status()== WL_CONNECTED){
     HTTPClient http;
     String serverPath = serverName + finger.fingerID;
     http.begin(client, serverPath.c_str());
    // http.begin(WiFiClient, serverPath.c_str());
     int httpResponseCode = http.GET();
    }
  delay(2000);


  return finger.fingerID;
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;

  // found a match!
  Serial.print("Found ID #"); Serial.print(finger.fingerID);
  Serial.print(" with confidence of "); Serial.println(finger.confidence);
  return finger.fingerID;
}
