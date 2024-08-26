
uint8_t ambilid()
{
  WiFiClient client;
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(5000);
    Serial.println("Menghubungkan ke WiFi...");
  }

  HTTPClient http;
  String serverUrl = serverAddress_daftar;
  Serial.print(serverUrl);

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
      Serial.print(F("Gagal parsing JSON: "));
      Serial.println(error.c_str());
      return 0;
    }

    String id = doc["out_1"].as<String>();
    Serial.print("Nilai out_1: ");
    Serial.println(id);
    
    out_2 = doc["out_2"].as<String>();
    Serial.print(", out_2: ");
    Serial.print(out_2);
    out_3 = doc["out_3"].as<String>();
    Serial.print(", out_3: ");
    Serial.print(out_3);

    uint8_t result = id.toInt();
    return result;
  }
  else
  {
    Serial.print("Kode Kesalahan HTTP: ");
    Serial.println(httpResponseCode);
    return 0;
  }

  http.end();
}
