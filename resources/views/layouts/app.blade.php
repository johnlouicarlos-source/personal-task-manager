<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'TaskFlow')</title>

    <style>
        /* ==============================
           TASKFLOW BRAND COLORS
        ============================== */

        :root {
            --navy: #172554;
            --navy-light: #1e3a8a;
            --blue: #2563eb;
            --blue-hover: #1d4ed8;

            --background: #f1f5f9;
            --card: #ffffff;

            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;

            --pending-bg: #fff7ed;
            --pending-text: #c2410c;

            --completed-bg: #ecfdf5;
            --completed-text: #047857;

            --danger: #dc2626;
            --danger-hover: #b91c1c;

            --warning: #d97706;
            --warning-hover: #b45309;
        }

        /* ==============================
           RESET
        ============================== */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        /* ==============================
           NAVIGATION
        ============================== */

        .navbar {
            background: linear-gradient(
                135deg,
                var(--navy),
                var(--navy-light)
            );

            color: white;
            padding: 0 5%;

            min-height: 70px;

            display: flex;
            align-items: center;

            box-shadow:
                0 2px 10px rgba(15, 23, 42, 0.15);
        }

        .navbar-container {
            width: 100%;
            max-width: 1150px;
            margin: auto;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            font-size: 21px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .brand-icon {
            width: 36px;
            height: 36px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255, 255, 255, 0.12);

            border: 1px solid rgba(255, 255, 255, 0.18);

            border-radius: 9px;

            font-size: 18px;
        }

        /* ==============================
           MAIN CONTAINER
        ============================== */

        .container {
            width: 90%;
            max-width: 1150px;

            margin: 38px auto 60px;
        }

        /* ==============================
           PAGE HEADER
        ============================== */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 26px;
        }

        .page-header h1 {
            margin: 0 0 4px;

            font-size: 32px;
            line-height: 1.2;

            color: var(--text);

            letter-spacing: -0.7px;
        }

        .page-header p {
            margin: 0;

            color: var(--muted);
            font-size: 15px;
        }

        /* ==============================
           CARD
        ============================== */

        .card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 26px;

            box-shadow:
                0 4px 12px rgba(15, 23, 42, 0.05);
        }

        /* ==============================
           BUTTONS
        ============================== */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            padding: 10px 16px;

            border: none;
            border-radius: 7px;

            font-size: 14px;
            font-weight: 600;

            text-decoration: none;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.15s ease,
                box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--blue);
            color: white;

            box-shadow:
                0 3px 8px rgba(37, 99, 235, 0.22);
        }

        .btn-primary:hover {
            background: var(--blue-hover);
        }

        .btn-warning {
            background: #fff7ed;
            color: var(--warning);

            border: 1px solid #fed7aa;
        }

        .btn-warning:hover {
            background: #ffedd5;
        }

        .btn-danger {
            background: #fef2f2;
            color: var(--danger);

            border: 1px solid #fecaca;
        }

        .btn-danger:hover {
            background: #fee2e2;
        }

        .btn-success {
            background: #ecfdf5;
            color: #047857;

            border: 1px solid #a7f3d0;
        }

        .btn-success:hover {
            background: #d1fae5;
        }

        /* ==============================
           TABLE
        ============================== */

        .task-table {
            width: 100%;

            border-collapse: separate;
            border-spacing: 0;

            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .task-table th {
            background: #f8fafc;

            color: #475569;

            font-size: 13px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 0.4px;

            padding: 14px 16px;

            text-align: left;

            border-bottom: 1px solid var(--border);
        }

        .task-table td {
            padding: 15px 16px;

            font-size: 14px;

            border-bottom: 1px solid var(--border);

            vertical-align: middle;
        }

        .task-table tr:last-child td {
            border-bottom: none;
        }

        .task-table tbody tr {
            transition: background 0.15s ease;
        }

        .task-table tbody tr:hover {
            background: #f8fafc;
        }

        /* ==============================
           STATUS
        ============================== */

        .status {
            display: inline-flex;
            align-items: center;

            gap: 6px;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 12px;
            font-weight: 700;
        }

        .status::before {
            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;
        }

        .status-pending {
            background: var(--pending-bg);
            color: var(--pending-text);
        }

        .status-pending::before {
            background: #f97316;
        }

        .status-completed {
            background: var(--completed-bg);
            color: var(--completed-text);
        }

        .status-completed::before {
            background: #10b981;
        }

        /* ==============================
           ACTIONS
        ============================== */

        .actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        /* ==============================
           EMPTY STATE
        ============================== */

        .empty-state {
            text-align: center;

            padding: 60px 30px;
        }

        .empty-icon {
            width: 58px;
            height: 58px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eff6ff;
            color: var(--blue);

            border-radius: 14px;

            font-size: 25px;
        }

        .empty-state h2 {
            margin-bottom: 7px;

            font-size: 21px;

            color: var(--text);
        }

        .empty-state p {
            margin-bottom: 20px;

            color: var(--muted);
        }

        /* ==============================
           ALERTS
        ============================== */

        .alert {
            padding: 13px 16px;

            margin-bottom: 20px;

            border-radius: 8px;

            font-size: 14px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;

            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;

            border: 1px solid #fecaca;
        }

        .error-list {
            margin: 6px 0 0 20px;
        }

        /* ==============================
           FORMS
        ============================== */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            font-size: 14px;
            font-weight: 600;

            color: var(--text);
        }

        .form-control {
            width: 100%;

            padding: 11px 13px;

            border: 1px solid #cbd5e1;

            border-radius: 7px;

            background: white;

            color: var(--text);

            font-size: 14px;

            outline: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--blue);

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        textarea.form-control {
            min-height: 120px;

            resize: vertical;
        }

        .form-actions {
            display: flex;

            gap: 10px;

            margin-top: 25px;
        }

        /* ==============================
           MOBILE
        ============================== */

        @media (max-width: 768px) {

            .navbar {
                padding: 0 4%;
            }

            .container {
                width: 92%;

                margin-top: 25px;
            }

            .page-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .card {
                padding: 18px;
            }

            .task-table {
                display: block;

                overflow-x: auto;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="navbar-container">

            <div class="brand">

                <div class="brand-icon">
                    ✓
                </div>

                <span>TaskFlow</span>

            </div>

        </div>

    </nav>

    <main class="container">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        @if($errors->any())

            <div class="alert alert-error">

                <strong>Please fix the following:</strong>

                <ul class="error-list">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        @yield('content')

    </main>

</body>
</html>