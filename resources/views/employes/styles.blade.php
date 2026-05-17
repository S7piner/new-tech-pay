<style>

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:20px;
}

.page-header h1{
    font-size:38px;
    color:#0f172a;
}

.page-header p{
    color:#64748b;
    margin-top:5px;
}

.form-container{
    background:white;
    padding:35px;
    border-radius:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.section-title{
    font-size:20px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:25px;
    padding-bottom:10px;
    border-bottom:1px solid #e2e8f0;
}

.grid{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(280px,1fr));
    gap:22px;
    margin-bottom:30px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group label{
    margin-bottom:10px;
    font-weight:600;
    color:#334155;
}

.form-group input,
.form-group select,
.form-group textarea{
    padding:15px;
    border:1px solid #dbeafe;
    border-radius:14px;
    background:#f8fafc;
    outline:none;
    transition:0.3s;
    font-size:15px;
}

.form-group textarea{
    min-height:120px;
    resize:none;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus{
    border-color:#2563eb;
    background:white;
    box-shadow:0 0 0 4px rgba(37,99,235,0.1);
}

.save-btn{
    background:#2563eb;
    color:white;
    border:none;
    padding:16px 28px;
    border-radius:14px;
    cursor:pointer;
    font-size:16px;
    font-weight:700;
    transition:0.3s;
}

.save-btn:hover{
    background:#1d4ed8;
}

.profile-card{
    background:white;
    padding:40px;
    border-radius:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.profile-header{
    display:flex;
    align-items:center;
    gap:30px;
    margin-bottom:40px;
    flex-wrap:wrap;
}

.profile-photo{
    width:140px;
    height:140px;
    border-radius:25px;
    object-fit:cover;
}

.profile-avatar{
    width:140px;
    height:140px;
    border-radius:25px;
    background:#2563eb;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:50px;
    font-weight:bold;
}

.profile-name{
    font-size:34px;
    color:#0f172a;
}

.profile-poste{
    color:#64748b;
    margin-top:10px;
    font-size:18px;
}

.profile-badge{
    display:inline-block;
    margin-top:15px;
    background:#dcfce7;
    color:#166534;
    padding:10px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:700;
}

.profile-grid{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(250px,1fr));
    gap:22px;
}

.info-card{
    background:#f8fafc;
    padding:22px;
    border-radius:18px;
}

.info-card strong{
    display:block;
    margin-bottom:10px;
    color:#0f172a;
}

.info-card p{
    color:#64748b;
}

</style>
