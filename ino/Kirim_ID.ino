
void sendToServer3(String id1)
{
  // HTTP GET request untuk mengirim data sidik jari ke server
  WiFiClient client;  // Create a WiFiClient object
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(1000);
    Serial.println("Menghubungkan ke WiFi...");
  }

  HTTPClient http;
  String serverUrl = serverAddress_daftar + "?pendaftaran="  + String(id1);
   Serial.print(serverUrl);
  

  // Use the updated begin method with WiFiClient parameter
  http.begin(client, serverUrl);

  int httpResponseCode = http.GET();

  if (httpResponseCode > 0)
  {
    Serial.print("Kode Respons HTTP: ");
    Serial.println(httpResponseCode);
    String response = http.getString();
    Serial.println(response);
    
  }
  else
  {
    Serial.print("Kode Kesalahan HTTP: ");
    Serial.println(httpResponseCode);
  }

  http.end();
}
