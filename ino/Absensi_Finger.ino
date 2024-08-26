uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK converted!
  p = finger.fingerSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Found a print match!");
    digitalWrite(relay,LOW);
    
    digitalWrite(bus,HIGH);
    delay(100);
    digitalWrite(bus,LOW);
    delay(100);
    digitalWrite(bus,HIGH);
    delay(100);
    digitalWrite(bus,LOW);
    delay(100);
    
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    lcd.clear();
    lcd.setCursor(0, 0);  
    lcd.print("Tidak terdaftar");
    digitalWrite(bus,HIGH);
     digitalWrite(red,HIGH);
    delay(3000);
    digitalWrite(bus,LOW);
    digitalWrite(red,LOW);

    
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("Did not find a match");
    lcd.clear();
    lcd.setCursor(0, 0);  
    lcd.print("Tidak terdaftar");
    
    
     digitalWrite(bus,HIGH);
     digitalWrite(red,HIGH);
    delay(3000);
    digitalWrite(bus,LOW);
    digitalWrite(red,LOW);

    
  lcd.clear();
    lcd.setCursor(0, 0);  
    lcd.print("FingerPrint");
  lcd.setCursor(0, 1);
 lcd.print("Ready..");

 
    return p;
  } else {
    Serial.println("Unknown error");

    lcd.clear();
    lcd.setCursor(0, 0);  
    lcd.print("Tidak terdaftar");
    digitalWrite(bus,HIGH);
     digitalWrite(red,HIGH);
    delay(3000);
    digitalWrite(bus,LOW);
    digitalWrite(red,LOW);

    lcd.clear();
    lcd.setCursor(0, 0);  
    lcd.print("FingerPrint");
  lcd.setCursor(0, 1);
 lcd.print("Ready..");
    
    return p;
  }

  // found a match!
  
  Serial.print("Found ID #"); Serial.print(finger.fingerID);
  Serial.print(" with confidence of "); Serial.println(finger.confidence);
   lcd.clear();
   lcd.setCursor(0, 0);  // Posisi kursor pada baris pertama, kolom pertama
   lcd.print("Loading.. ");
   lcd.setCursor(0, 1);  // Posisi kursor pada baris pertama, kolom pertama
   lcd.print("Proses Absen.. ");
   sendToServer2((String)finger.fingerID);

   lcd.clear();
    lcd.setCursor(0, 0);  
    lcd.print("Nama: " + nama + "       ");

    lcd.setCursor(0, 1);  
    lcd.print("Jam: " + jam + "        ");
    nama = "";
    jam = "";
     delay(3000);
    
   
    
   //telegram();
    lcd.clear();
    lcd.setCursor(0, 0);
  
   lcd.print("FingerPrint");
  lcd.setCursor(0, 1);
 lcd.print("Ready..");
    delay(3000);
   digitalWrite(relay,HIGH);
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
   sendToServer2((String)finger.fingerID);
  //ambilfinger();
  lcd.clear();
  lcd.setCursor(0, 0);  // Posisi kursor pada baris pertama, kolom pertama
  lcd.print("NISN : " + out_2);
  lcd.setCursor(0, 1);  // Posisi kursor pada baris kedua, kolom pertama
  lcd.print("Nama : " + out_3);
    delay(3000);
      lcd.clear();
      lcd.setCursor(0, 0);  // Posisi kursor pada baris pertama, kolom pertama
      lcd.print("Silahkan Absen");
  return finger.fingerID;
}
