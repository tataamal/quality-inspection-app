# 🧱 Architecture - Quality Inspection System

## 1. Overview
This architecture defines how different components of the Quality Inspection System are structured, how they communicate, and how data flows from the user interface to the SAP backend.

---

## 2. System Layers
```
[Frontend (Browser)]
     │
     ▼
[Laravel Web App: Blade + Controllers]
     │
     ▼
[Laravel Models + MySQL DB] ←→ [Flask API Bridge] ←→ [SAP BAPI]
```

---

## 3. Components Breakdown

### 🖥 Frontend
- Blade templates using Tailwind CSS
- Camera/photo input, quantity, checklist UI
- JavaScript enhancements (optionally with AJAX/DataTables)

### 🧠 Laravel Backend
- `QualityInspectionController.php` handles form input & submission
- `QualityInspection.php` model manages inspection data
- Saves records to `quality_inspections` table
- Authenticated session includes SAP user credentials

### 🔄 API Bridge (Flask)
- Receives POST from Laravel with usage decision data
- Calls SAP BAPI `BAPI_INSPLOT_SETUSAGEDECISION`
- Returns success/error status to Laravel

### 🏢 SAP Backend
- Processes inspection lot via BAPI
- Updates quality lot status (usage decision)
- Returns confirmation or failure message

---

## 4. Data Flow (Inspection Submission)
1. User logs in to Laravel
2. Opens form and fills inspection data (photo, checklist, quantity)
3. Form submits to `QualityInspectionController@store`
4. Laravel stores record in MySQL
5. Laravel sends usage decision data to Flask
6. Flask authenticates with SAP and triggers BAPI
7. SAP responds with confirmation
8. Laravel updates inspection status and shows message to user

---

## 5. Technologies Used
| Layer         | Technology           |
|---------------|----------------------|
| Frontend      | Blade, Tailwind CSS  |
| Backend       | Laravel (PHP), MySQL |
| API Bridge    | Python Flask         |
| SAP Connector | SAP BAPI             |

---

## 6. SAP Communication
- SAP user credentials are stored in session upon login
- Flask reuses credentials to connect to SAP
- All SAP calls are wrapped in try/except blocks
- Errors are logged and returned to Laravel

---

## 7. Diagram (Text)
```
[User Browser]
    ↓
[Laravel Blade Form] → [QualityInspectionController@store]
    ↓                             ↓
[MySQL: quality_inspections]   [Flask: POST /sap/usage-decision]
                                      ↓
                             [SAP: BAPI_INSPLOT_SETUSAGEDECISION]
```

