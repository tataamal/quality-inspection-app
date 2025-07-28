# 🧾 API Documentation - Flask Bridge to SAP

## 1. Overview
This document describes the API endpoints used by the Laravel system to interact with SAP via the Flask API bridge.

---

## 2. Base URL
```
http://<flask-server>:5050
```

---

## 3. Endpoint: `POST /sap/usage-decision`
Used to send inspection results from Laravel to SAP and trigger a Usage Decision via BAPI.

### 🔐 Auth
SAP credentials must be passed from Laravel session via secure internal routing. No public tokens.

### 📥 Request Body (JSON)
```json
{
  "UD_SELECTED_SET": "A",          // Usage Decision Code
  "UD_PLANT": "1100",              // Plant
  "UD_CODE_GROUP": "01",           // Code Group
  "UD_CODE": "A1",                 // Usage Decision Reason
  "UD_RECORDED_BY_USER": "QC12345",// SAP User
  "UD_RECORDED_ON_DATE": "2025-07-28",
  "UD_RECORDED_AT_TIME": "14:32:00",
  "UD_FORCE_COMPLETION": "X",
  "UD_STOCK_POSTING": {
    "INSPLOT": "010001234567",
    "STCK_TYPE": "1",
    "QUANTITY": 100,
    "UOM": "PC",
    "MOVE_TYPE": "321",
    "PLANT": "1100",
    "STGE_LOC": "FG01"
  }
}
```

### 📤 Response (Success)
```json
{
  "status": "success",
  "message": "Usage decision posted successfully."
}
```

### ❌ Response (Error)
```json
{
  "status": "error",
  "message": "BAPI error: Inspection lot not found."
}
```

---

## 4. Endpoint: `GET /api/get-data-semarang`
Fetches delivery order data from SAP area "Semarang".

### 🔐 Auth
Uses SAP session from Laravel login.

### 📤 Response
```json
{
  "status": "success",
  "message": "25 data dari area Semarang berhasil diambil.",
  "data": [
    {
      "VBELN": "4900012345",
      "KUNNR": "CUST01",
      "MATNR": "MAT-001",
      "LFMNG": 10,
      "PRUEFLOS": "010000987654",
      ...
    }
  ]
}
```

---

## 5. Notes
- All responses follow JSON structure.
- Flask handles SAP errors and returns them as HTTP 500 or 204 if no data.
- Use Laravel controller to log all transactions.

---

> 🧠 For Flask error logs and BAPI call results, check the Flask server log file `/logs/sap_api.log`

