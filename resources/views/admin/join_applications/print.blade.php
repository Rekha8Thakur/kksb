<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application_{{ Str::slug($application->name) }}</title>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: #1a1a1a;
            line-height: 1.5;
            margin: 0;
            padding: 40px;
            font-size: 13px;
        }
        .header {
            border-bottom: 2px solid #111;
            padding-bottom: 15px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .logo {
            font-size: 22px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .logo span {
            color: #FF6A00;
        }
        .title {
            text-align: right;
        }
        .title h1 {
            margin: 0 0 3px 0;
            font-size: 16px;
            text-transform: uppercase;
            color: #555;
        }
        .title p {
            margin: 0;
            font-size: 11px;
            color: #777;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #FF6A00;
            border-bottom: 1px solid #ddd;
            padding-bottom: 4px;
            margin-bottom: 12px;
        }
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
        }
        .field {
            margin-bottom: 8px;
        }
        .field-label {
            font-size: 9px;
            text-transform: uppercase;
            color: #777;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .field-value {
            font-weight: 600;
            font-size: 13px;
            color: #111;
        }
        .message-box {
            background-color: #f9f9f9;
            border: 1px solid #e5e7eb;
            padding: 12px;
            border-radius: 8px;
            white-space: pre-wrap;
            font-size: 12px;
            color: #374151;
        }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            font-size: 10px;
            font-weight: 700;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .badge-influencer {
            background-color: #f3e8ff;
            color: #6b21a8;
        }
        .badge-career {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .btn-print-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-back {
            color: #4b5563;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }
        .btn-print {
            background-color: #111;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-weight: 700;
            font-size: 11px;
            border-radius: 6px;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }
        @media print {
            .btn-print-container {
                display: none;
            }
            body {
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <div class="btn-print-container">
        <a href="javascript:window.close()" class="btn-back">&larr; Close Window</a>
        <button onclick="window.print()" class="btn-print">Print / Save PDF</button>
    </div>

    <div class="header">
        <div class="logo">KKSB<span>STUDIOS</span></div>
        <div class="title">
            <h1>Join Us Application</h1>
            <p>Submitted: {{ $application->created_at->format('M d, Y H:i A') }}</p>
        </div>
    </div>

    <!-- Basic Info -->
    <div class="section">
        <div class="section-title">Applicant Profile</div>
        <div class="grid-2">
            <div>
                <div class="field">
                    <div class="field-label">Name</div>
                    <div class="field-value">{{ $application->name }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Email</div>
                    <div class="field-value">{{ $application->email }}</div>
                </div>
                <div class="field">
                    <div class="field-label">Phone</div>
                    <div class="field-value">{{ $application->phone ?? 'N/A' }}</div>
                </div>
            </div>
            <div>
                <div class="field">
                    <div class="field-label">Application Type</div>
                    <div>
                        @if($application->type === 'influencer')
                            <span class="badge badge-influencer">Influencer Partner</span>
                        @else
                            <span class="badge badge-career">Careers & Internships</span>
                        @endif
                    </div>
                </div>
                @if($application->type === 'career' && $application->position)
                    <div class="field">
                        <div class="field-label">Applied Position</div>
                        <div class="field-value">{{ $application->position }}</div>
                    </div>
                @endif
                @if($application->type === 'influencer' && $application->social_link)
                    <div class="field">
                        <div class="field-label">Social Profile Link</div>
                        <div class="field-value">{{ $application->social_link }}</div>
                    </div>
                @elseif($application->type === 'career' && $application->resume_link)
                    <div class="field">
                        <div class="field-label">Resume / Portfolio Link</div>
                        <div class="field-value">{{ $application->resume_link }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Message / Cover letter -->
    @if($application->message)
        <div class="section">
            <div class="section-title">Cover Message / Details</div>
            <div class="message-box">{{ $application->message }}</div>
        </div>
    @endif

    <!-- Extra Form Data -->
    @if($application->form_data)
        <div class="section">
            <div class="section-title">Form Submissions Details</div>
            
            @if($application->type === 'influencer')
                <div class="grid-3">
                    <div class="field">
                        <div class="field-label">Age</div>
                        <div class="field-value">{{ $application->form_data['age'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Gender</div>
                        <div class="field-value">{{ $application->form_data['gender'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Current City</div>
                        <div class="field-value">{{ $application->form_data['city'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Camera Comfort</div>
                        <div class="field-value">{{ $application->form_data['comfortable_camera'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Comfort Traveling</div>
                        <div class="field-value">{{ $application->form_data['travel_comfort'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Okay with Unpaid Trials</div>
                        <div class="field-value">{{ $application->form_data['trial_ok'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Shoot Availability</div>
                        <div class="field-value">{{ $application->form_data['availability'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Role Type Comfort</div>
                        <div class="field-value">{{ $application->form_data['role_comfort'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Expected Pay per Shoot</div>
                        <div class="field-value">{{ $application->form_data['expected_amount'] ?? 'N/A' }}</div>
                    </div>
                </div>

                <div style="margin-top: 15px;">
                    <div class="field">
                        <div class="field-label">Spoken Languages</div>
                        <div class="field-value">
                            {{ is_array($application->form_data['languages'] ?? null) ? implode(', ', $application->form_data['languages']) : 'None specified' }}
                        </div>
                    </div>
                    <div class="field" style="margin-top: 8px;">
                        <div class="field-label">Shoot Comfort Types</div>
                        <div class="field-value">
                            {{ is_array($application->form_data['shoot_comfort'] ?? null) ? implode(', ', $application->form_data['shoot_comfort']) : 'None specified' }}
                        </div>
                    </div>
                    <div class="field" style="margin-top: 8px;">
                        <div class="field-label">Restrictions / Comfort Limits</div>
                        <div class="field-value">{{ $application->form_data['restrictions'] ?? 'None specified' }}</div>
                    </div>
                    <div class="field" style="margin-top: 8px;">
                        <div class="field-label">Main Goals / Seeking</div>
                        <div class="field-value">{{ $application->form_data['seeking'] ?? 'N/A' }}</div>
                    </div>
                </div>

            @elseif($application->type === 'career')
                <div class="grid-3">
                    <div class="field">
                        <div class="field-label">Current City</div>
                        <div class="field-value">{{ $application->form_data['city'] ?? 'N/A' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Own Camera?</div>
                        <div class="field-value">{{ $application->form_data['own_camera'] ?? 'No' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Own Gimbal?</div>
                        <div class="field-value">{{ $application->form_data['own_gimbal'] ?? 'No' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Own Vehicle?</div>
                        <div class="field-value">{{ $application->form_data['own_vehicle'] ?? 'No' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Relocate to Solan?</div>
                        <div class="field-value">{{ $application->form_data['relocate_solan'] ?? 'No' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Comfort with Deadlines?</div>
                        <div class="field-value">{{ $application->form_data['comfort_deadlines'] ?? 'Yes' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Expected Salary</div>
                        <div class="field-value">{{ $application->form_data['salary_expected'] ?? 'Negotiable' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Available to Join</div>
                        <div class="field-value">{{ $application->form_data['join_availability'] ?? 'Immediate' }}</div>
                    </div>
                </div>

                <div style="margin-top: 15px;">
                    <div class="field">
                        <div class="field-label">Applying For Roles</div>
                        <div class="field-value">
                            {{ is_array($application->form_data['applying_for'] ?? null) ? implode(', ', $application->form_data['applying_for']) : 'None specified' }}
                        </div>
                    </div>
                    <div class="field" style="margin-top: 8px;">
                        <div class="field-label">Experience Level</div>
                        <div class="field-value">
                            {{ is_array($application->form_data['experience_level'] ?? null) ? implode(', ', $application->form_data['experience_level']) : 'None specified' }}
                        </div>
                    </div>
                    <div class="field" style="margin-top: 8px;">
                        <div class="field-label">Software Knowledge</div>
                        <div class="field-value">{{ $application->form_data['software_knowledge'] ?? 'None specified' }}</div>
                    </div>
                    <div class="field" style="margin-top: 8px;">
                        <div class="field-label">Laptop/Desktop Specifications</div>
                        <div class="field-value">{{ $application->form_data['laptop_specs'] ?? 'None' }}</div>
                    </div>
                    @if(!empty($application->form_data['youtube']))
                        <div class="field" style="margin-top: 8px;">
                            <div class="field-label">YouTube Work Link</div>
                            <div class="field-value"><a href="{{ $application->form_data['youtube'] }}" target="_blank">{{ $application->form_data['youtube'] }}</a></div>
                        </div>
                    @endif
                    @if(!empty($application->form_data['previous_work']))
                        <div class="field" style="margin-top: 8px;">
                            <div class="field-label">Previous Client Work Link</div>
                            <div class="field-value"><a href="{{ $application->form_data['previous_work'] }}" target="_blank">{{ $application->form_data['previous_work'] }}</a></div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    @endif

    <script>
        // Trigger print dialog automatically when document is loaded
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>