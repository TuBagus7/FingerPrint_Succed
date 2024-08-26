#include <Wire.h>
#include <Adafruit_Fingerprint.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <LiquidCrystal_I2C.h>
#include <ArduinoJson.h>
#include <UniversalTelegramBot.h>

#if (defined(__AVR__) || defined(ESP8266)) && !defined(__AVR_ATmega2560__)

SoftwareSerial mySerial(D6, D7);
#define SDA_PIN D1  // D1
#define SCL_PIN D2 //  
#else 
#define mySerial Serial1
#endif

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
String out_3;
String out_2;
String nama;
String jam;
uint8_t id1;
String id;
uint8_t fingerID;
int relay = D3;
int bus = 16;
int red = D5;

const int buttonPin = D8; 
const int buttonPin_daftar = A0; 
const char* ssid = "wifi-iot";
const char* password = "password-iot";
String serverAddress = String("http://localhost-web.com/2024-helmi-absensi-sidik-jari/absen.php?absen="); 
String serverAddress_daftar = String("http://localhost-web.com/2024-helmi-absensi-sidik-jari/server.php"); 

LiquidCrystal_I2C lcd(0x27, 16, 2); // Sesuaikan alamat I2C LCD dan ukuran tampilan LCD


void setup()
{
  Serial.begin(9600);
  while (!Serial);
  delay(5000);
  Wire.begin(SDA_PIN, SCL_PIN);
   pinMode(buttonPin, INPUT);
   pinMode(buttonPin_daftar, INPUT);
  pinMode(relay, OUTPUT);

pinMode(red, OUTPUT);
  Serial.println("\n\nPendaftaran Sidik Jari dengan Sensor Fingerprint");
 
  
  digitalWrite(relay,HIGH);
  
 digitalWrite(red,LOW);

  lcd.begin();
  lcd.backlight();
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Check...");
  lcd.setCursor(0, 1);
  lcd.print("FingerPrint");

  finger.begin(57600);

  if (finger.verifyPassword())
  {
    Serial.println("Sensor sidik jari terdeteksi!");
     
  }
  else
  {
    Serial.println("Sensor sidik jari tidak terdeteksi :(");
    while (1)
    {
      delay(5000);
    }
  }

  Serial.println(F("Membaca parameter sensor"));
  finger.getParameters();
  Serial.print(F("Status: 0x"));
  Serial.println(finger.status_reg, HEX);
  Serial.print(F("Sys ID: 0x"));
  Serial.println(finger.system_id, HEX);
  Serial.print(F("Kapasitas: "));
  Serial.println(finger.capacity);
  Serial.print(F("Tingkat Keamanan: "));
  Serial.println(finger.security_level);
  Serial.print(F("Alamat perangkat: "));
  Serial.println(finger.device_addr, HEX);
  Serial.print(F("Panjang paket: "));
  Serial.println(finger.packet_len);
  Serial.print(F("Baud rate: "));
  Serial.println(finger.baud_rate);

  pinMode(bus, OUTPUT);
  lcd.clear();
 
}


void(* ku_reset) (void) = 0;

uint8_t readnumber(void) {
  uint8_t num = 0;

  while (num == 0) {
    while (! Serial.available());
    num = Serial.parseInt();
  }
  return num;
}

int daftar = 0;
int st = 0;
void loop() {


            if (st == 0)
            {
            
              lcd.setCursor(0, 0);
  
  lcd.print("FingerPrint");
  lcd.setCursor(0, 1);
  lcd.print("Ready..");

  
              digitalWrite(bus,HIGH);
              delay(500);
              digitalWrite(bus,LOW);
              st = 1;
            }
  
    int buttonState = digitalRead(buttonPin);
    int buttondaftar = analogRead(buttonPin_daftar);


if (daftar == 0){
    if (buttondaftar > 900){
                daftar  = 1;


                lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Daftar");
      lcd.setCursor(0, 1);
      lcd.print("FingerPrint");

      
                digitalWrite(bus,HIGH);
                delay(1000);
                digitalWrite(bus,LOW);
                delay(1000);
                digitalWrite(bus,HIGH);
                delay(1000);
                digitalWrite(bus,LOW);
                delay(1000);
    
                lcd.print("Pendaftaran");
    }
    }

    
    
        if (buttonState == HIGH) {
           digitalWrite(relay,LOW);
           digitalWrite(relay,LOW);
    
            digitalWrite(bus,HIGH);
            delay(100);
            digitalWrite(bus,LOW);
            delay(100);
            digitalWrite(bus,HIGH);
            delay(100);
            digitalWrite(bus,LOW);
            delay(100);
            lcd.clear();
        lcd.print("Manual");
  lcd.setCursor(0, 1);
  lcd.print("Open");
            delay(5000);
            digitalWrite(relay,HIGH);
lcd.clear();
            lcd.print("FingerPrint");
  lcd.setCursor(0, 1);
  lcd.print("Ready..");
        }
    
    

    if (daftar == 1) {
      
      Serial.println("Siap untuk mendaftarkan sidik jari!");
      Serial.println("Silakan masukkan nomor ID # (dari 1 hingga 127) yang ingin Anda simpan untuk sidik jari ini...");

      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Get ID, Loading...");
      lcd.setCursor(0, 1);
      lcd.print("From Server");

         id1 = ambilid();

         
    if (id1 == 0)
    {

       lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("ID Finggerprint");
      lcd.setCursor(0, 1);
      lcd.print("Tidak Ditemukan");

      
      ku_reset();
    }
      
      Serial.print("Mendaftarkan ID #");
      Serial.println(id);

      while (!getFingerprintEnroll());
      daftar = 0;  
    } else {
        // Jalankan logika login di sini
       getFingerprintID();
    
     delay(5000);  
      Serial.println("Logika Login disini");
       Serial.println(buttonState);
    }
}
