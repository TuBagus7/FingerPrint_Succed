#include <ArduinoJson.h>
#include "CTBot.h"

CTBot myBot;

String token = "5997243332:AAHhmtU8O5qNdiUBbxe7zpcUYQtPGBsZc7U";
const int id3 = 1854165205;

void telegram() {
  Serial.begin(9600);
  Serial.println("Starting TelegramBot...");
  myBot.wifiConnect(ssid, password);
  myBot.setTelegramToken(token);

  if (myBot.testConnection()) {
    Serial.println("Koneksi Bagus");
  } else {
    Serial.println("Koneksi Jelek");
  }

  myBot.sendMessage(id3, + "NISN     : " + out_2 + "\nNama     : " + out_3 + "\nPresensi : Berhasil");
  Serial.println("Pesan Terkirim");
}
