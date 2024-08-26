
void sendToServer2(String fingerID)
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
  String serverUrl = serverAddress  + String(fingerID);
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
    DynamicJsonDocument doc(1024); 
    DeserializationError error = deserializeJson(doc, response);
      if (error)
    {
      Serial.print("Gagal mem-parsing JSON: ");
      Serial.println(error.c_str());
    }
    else
    {
      // Akses nilai JSON sesuai kebutuhan
      // Misalnya, ambil nilai dari kunci "nama"
    out_2 = doc["out_2"].as<String>();
    jam = doc["out_2"].as<String>();
    Serial.print(", out_2: ");
    Serial.print(out_2);
    out_3 = doc["out_3"].as<String>();
    nama = doc["out_3"].as<String>();
    Serial.print(", out_3: ");
    Serial.print(out_3);
    }
  }
  else
  {
    Serial.print("Kode Kesalahan HTTP: ");
    Serial.println(httpResponseCode);
  }

  

  http.end();
}
