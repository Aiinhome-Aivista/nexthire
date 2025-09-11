<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobnest | Employer Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #2a5298;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 8px;
            display: block;
            margin-bottom: 8px;
            transition: background 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1e3c72;
        }

        /* Main Content */
        .main {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        h1 {
            font-size: 24px;
            color: #2a5298;
            margin-bottom: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .stats {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .stat-box {
            flex: 1;
            background: #f0f4ff;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }

        .stat-box h3 {
            margin: 0;
            font-size: 22px;
            color: #2a5298;
        }

        .stat-box p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #f0f4ff;
            color: #2a5298;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            color: #fff;
        }

        .active {
            background: #28a745;
        }

        .draft {
            background: #ffc107;
        }

        .expired {
            background: #dc3545;
        }

        button {
            background: #2a5298;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #1e3c72;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img style="height:40px; width:90px;" src="<?= base_url('assets/images/jobnest.png'); ?>" alt="JobNest"><br>
        <a href="#" class="active">Dashboard</a>
        <a href="<?= base_url('employer_job_post'); ?>">Post Job</a>
        <a href="#">Manage Jobs</a>
        <a href="#">Candidates</a>
        <a href="#">Company Profile</a>
    </div>

    <!-- Main Content -->
    <div class="main">
        <!-- Dashboard -->
        <div class="card">
            <h1>Dashboard</h1>
            <div class="stats">
                <div class="stat-box">
                    <h3>12</h3>
                    <p>Active Jobs</p>
                </div>
                <div class="stat-box">
                    <h3>5</h3>
                    <p>Expired Jobs</p>
                </div>
                <div class="stat-box">
                    <h3>128</h3>
                    <p>Total Applications</p>
                </div>
                <div class="stat-box">
                    <h3>42</h3>
                    <p>Shortlisted</p>
                </div>
            </div>
        </div>

        <!-- Manage Jobs -->
        <div class="card">
            <h1>Manage Jobs</h1>
            <table>
                <tr>
                    <th>Job Title</th>
                    <th>Status</th>
                    <th>Applications</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>Software Engineer</td>
                    <td><span class="badge active">Active</span></td>
                    <td>34</td>
                    <td>
                        <button>Edit</button>
                        <button>Close</button>
                    </td>
                </tr>
                <tr>
                    <td>UI/UX Designer</td>
                    <td><span class="badge draft">Draft</span></td>
                    <td>0</td>
                    <td>
                        <button>Edit</button>
                        <button>Publish</button>
                    </td>
                </tr>
                <tr>
                    <td>Data Analyst</td>
                    <td><span class="badge expired">Expired</span></td>
                    <td>21</td>
                    <td>
                        <button>Duplicate</button>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Applications -->
        <div class="card">
            <h1>Applications</h1>
            <table>
                <tr>
                    <th>Candidate Name</th>
                    <th>Status</th>
                    <th>Resume</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>Alice Johnson</td>
                    <td>Applied</td>
                    <td><button>View</button></td>
                    <td>
                        <button>Shortlist</button>
                        <button>Reject</button>
                    </td>
                </tr>
                <tr>
                    <td>Michael Smith</td>
                    <td>Shortlisted</td>
                    <td><button>View</button></td>
                    <td>
                        <button>Schedule Interview</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>