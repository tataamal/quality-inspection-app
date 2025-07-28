# 📘 Quality Inspection System - PT. Kayu Mabel Indonesia

## 📌 Overview

A Laravel-based web system to streamline quality inspection operations, integrated with SAP for usage decisions and reporting.

## 💡 Project Goals

- Simplify product quality inspections for QC staff
- Capture inspection data including photos, quantity, and checklist
- Transmit usage decisions to SAP via Flask API
- Improve reporting and traceability of inspection records

## 👥 Target Users

- QC Staff at Kayu Mabel Indonesia
- ERP IT Support Team

## 🧱 Tech Stack

- **Backend**: Laravel (PHP), MySQL
- **Frontend**: Blade + Tailwind CSS + Javascript
- **API Bridge**: Flask (Python) for SAP BAPI

## 📁 Laravel Directory Structure

```
app/
├── Http/Controllers/QualityInspectionController.php
├── Models/QualityInspection.php
resources/views/inspections/
├── index.blade.php
├── create.blade.php
routes/web.php
```

## 🔌 SAP Integration

- Flask API Endpoint: `/sap/usage-decision`
- SAP BAPI: `BAPI_INSPLOT_SETUSAGEDECISION`
- Authenticated using Laravel session credentials

## 📋 Core Features

- Quality Inspection Form (photo capture, quantity input, checklist)
- Real-time data posting to SAP via Flask
- Result history and inspection traceability

## 🔄 Workflow

1. User logs in to Laravel
2. Enters inspection details and uploads photos
3. Laravel saves data to MySQL and forwards to Flask
4. Flask triggers BAPI to post usage decision
5. Status returned and stored

## 🔐 Authentication Flow

- Laravel Auth handles login and SAP credential session
- SAP login credentials stored temporarily in session for API use

## 🧪 Testing Tools

- PHPUnit for backend testing
- Postman for Flask API

## 🚀 Deployment

- Laravel: Hosted on VPS or Laravel Forge
- Flask: Deployed using Gunicorn + Nginx

## 📂 Future Enhancements

-

## 🗂 Docs Folder Plan

```
docs/
├── architecture.md
├── api-flask.md
├── db-schema.sql
├── ui-wireframe.png
```

---

> 📘 For detailed inspection architecture, see [`docs/architecture.md`](docs/architecture.md)
> 🧾 For API request/response schema, see [`docs/api-flask.md`](docs/api-flask.md)

