@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Header Section -->
    <div class="dashboard-header">
        <div class="header-left">
            <div class="welcome-badge">
                <span class="badge-icon">🎯</span>
                <span>Tableau de bord RH</span>
            </div>
            <h1 class="dashboard-title">Dashboard RH & Paie</h1>
            <p class="dashboard-subtitle">Bienvenue sur votre espace de gestion d'entreprise</p>
        </div>

        <div class="header-right">
            <div class="period-card">
                <span class="period-icon">📅</span>
                <div class="period-info">
                    <span class="period-label">Période en cours</span>
                    <strong class="period-value">Mai 2026</strong>
                </div>
            </div>

            <div class="user-card">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="user-info">
                    <strong class="user-name">{{ auth()->user()->name }}</strong>
                    <span class="user-role">{{ auth()->user()->role }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- KPI Section -->
    <div class="kpi-grid">
        <!-- Employés Card -->
        <div class="kpi-card kpi-employees">
            <div class="kpi-content">
                <div class="kpi-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="kpi-stats">
                    <span class="kpi-label">Total Employés</span>
                    <h2 class="kpi-value">{{ \App\Models\Employe::where('entreprise_id', auth()->user()->entreprise_id)->count() }}</h2>
                    <div class="kpi-trend positive">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                        <span>+12% ce mois</span>
                    </div>
                </div>
            </div>
            <div class="kpi-decoration"></div>
        </div>

        <!-- Contrats Card -->
        <div class="kpi-card kpi-contracts">
            <div class="kpi-content">
                <div class="kpi-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <div class="kpi-stats">
                    <span class="kpi-label">Contrats Actifs</span>
                    <h2 class="kpi-value">{{ \App\Models\Contrat::where('entreprise_id', auth()->user()->entreprise_id)->where('statut', 'actif')->count() }}</h2>
                    <div class="kpi-status success">✓ Tous validés</div>
                </div>
            </div>
        </div>

        <!-- Masse Salariale Card -->
        <div class="kpi-card kpi-payroll">
            <div class="kpi-content">
                <div class="kpi-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <div class="kpi-stats">
                    <span class="kpi-label">Masse Salariale</span>
                    <h2 class="kpi-value">12 450 000 FCFA</h2>
                    <div class="kpi-trend positive">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                        <span>+8% évolution</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pointages Card -->
        <div class="kpi-card kpi-attendance">
            <div class="kpi-content">
                <div class="kpi-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <div class="kpi-stats">
                    <span class="kpi-label">Pointages</span>
                    <h2 class="kpi-value">{{ \App\Models\Pointage::where('entreprise_id', auth()->user()->entreprise_id)->count() }}</h2>
                    <div class="kpi-trend neutral">Activité récente</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="dashboard-grid">
        <!-- Company Info Section -->
        <div class="card company-card">
            <div class="card-header">
                <div class="card-title-section">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"/>
                            <line x1="9" y1="9" x2="15" y2="15"/>
                            <line x1="15" y1="9" x2="9" y2="15"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Informations Entreprise</h2>
                </div>
                <span class="status-badge active">Active</span>
            </div>

            <div class="company-grid">
                <div class="info-field">
                    <label>Entreprise</label>
                    <p class="info-value">{{ auth()->user()->entreprise->nom_entreprise ?? 'Non renseigné' }}</p>
                </div>
                <div class="info-field">
                    <label>Activité</label>
                    <p class="info-value">{{ auth()->user()->entreprise->activite ?? 'Non renseigné' }}</p>
                </div>
                <div class="info-field">
                    <label>Téléphone</label>
                    <p class="info-value">{{ auth()->user()->entreprise->telephone ?? 'Non renseigné' }}</p>
                </div>
                <div class="info-field">
                    <label>Ville</label>
                    <p class="info-value">{{ auth()->user()->entreprise->ville ?? 'Non renseigné' }}</p>
                </div>
                <div class="info-field">
                    <label>Secteur</label>
                    <p class="info-value">{{ auth()->user()->entreprise->secteur ?? 'Non renseigné' }}</p>
                </div>
                <div class="info-field">
                    <label>Pays</label>
                    <p class="info-value">{{ auth()->user()->entreprise->pays ?? 'Non renseigné' }}</p>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="card activities-card">
            <div class="card-header">
                <div class="card-title-section">
                    <div class="card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Activités Récentes</h2>
                </div>
                <a href="#" class="view-all">Voir tout →</a>
            </div>

            <div class="activities-list">
                <div class="activity-item">
                    <div class="activity-avatar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Nouvel employé ajouté</div>
                        <div class="activity-time">Aujourd'hui, 14:30</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-avatar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Contrat validé</div>
                        <div class="activity-time">Il y a 2 heures</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-avatar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                        </svg>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Rubrique créée</div>
                        <div class="activity-time">Il y a 5 heures</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="quick-actions">
        <div class="quick-actions-header">
            <h2>Actions Rapides</h2>
            <p>Accédez rapidement aux fonctionnalités principales</p>
        </div>

        <div class="actions-grid">
            <a href="/employes/create" class="action-card">
                <div class="action-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                        <line x1="12" y1="3" x2="12" y2="11"/>
                        <line x1="8" y1="7" x2="16" y2="7"/>
                    </svg>
                </div>
                <div class="action-info">
                    <h3>Ajouter Employé</h3>
                    <p>Enregistrer un nouvel employé</p>
                </div>
            </a>

            <a href="/contrats/create" class="action-card">
                <div class="action-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <div class="action-info">
                    <h3>Nouveau Contrat</h3>
                    <p>Créer un contrat de travail</p>
                </div>
            </a>

            <a href="/pointages/create" class="action-card">
                <div class="action-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <div class="action-info">
                    <h3>Nouveau Pointage</h3>
                    <p>Enregistrer les présences</p>
                </div>
            </a>

            <a href="/rubriques/create" class="action-card">
                <div class="action-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                </div>
                <div class="action-info">
                    <h3>Nouvelle Rubrique</h3>
                    <p>Ajouter une rubrique salariale</p>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
/* Reset & Base */
.dashboard-container {
    max-width: 1440px;
    margin: 0 auto;
    padding: 2rem;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    min-height: 100vh;
}

/* Header Styles */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.welcome-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #e0e7ff 0%, #dbeafe 100%);
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    margin-bottom: 1rem;
}

.badge-icon {
    font-size: 1rem;
}

.welcome-badge span:last-child {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1e40af;
}

.dashboard-title {
    font-size: 2.25rem;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 0.5rem;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.dashboard-subtitle {
    color: #64748b;
    font-size: 0.95rem;
}

.header-right {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.period-card {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    padding: 0.75rem 1.25rem;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: white;
    box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
}

.period-icon {
    font-size: 1.25rem;
}

.period-info {
    display: flex;
    flex-direction: column;
}

.period-label {
    font-size: 0.7rem;
    opacity: 0.8;
}

.period-value {
    font-size: 0.875rem;
    font-weight: 700;
}

.user-card {
    background: white;
    padding: 0.5rem 1rem 0.5rem 0.5rem;
    border-radius: 3rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border: 1px solid #e5e7eb;
}

.user-avatar {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
}

.user-name {
    color: #0f172a;
    font-size: 0.875rem;
}

.user-role {
    font-size: 0.7rem;
    color: #64748b;
}

/* KPI Grid */
.kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.kpi-card {
    background: white;
    border-radius: 1.5rem;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #f0f0f0;
}

.kpi-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.1);
}

.kpi-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    position: relative;
    z-index: 2;
}

.kpi-icon {
    width: 56px;
    height: 56px;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eff6ff;
    color: #2563eb;
}

.kpi-stats {
    text-align: right;
}

.kpi-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
    font-weight: 600;
}

.kpi-value {
    font-size: 2rem;
    font-weight: 800;
    color: #0f172a;
    margin: 0.25rem 0 0.5rem;
}

.kpi-trend {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.7rem;
    font-weight: 600;
    padding: 0.25rem 0.5rem;
    border-radius: 2rem;
}

.kpi-trend.positive {
    background: #dcfce7;
    color: #166534;
}

.kpi-trend.neutral {
    background: #fef3c7;
    color: #92400e;
}

.kpi-status {
    font-size: 0.7rem;
    font-weight: 600;
    padding: 0.25rem 0.5rem;
    border-radius: 2rem;
    background: #dbeafe;
    color: #1e40af;
    display: inline-block;
}

.kpi-decoration {
    position: absolute;
    bottom: -30px;
    right: -30px;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    opacity: 0.1;
}

.kpi-employees .kpi-decoration {
    background: #2563eb;
}

.kpi-contracts .kpi-decoration {
    background: #10b981;
}

.kpi-payroll .kpi-decoration {
    background: #8b5cf6;
}

.kpi-attendance .kpi-decoration {
    background: #f59e0b;
}

/* Dashboard Grid */
.dashboard-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

/* Card Styles */
.card {
    background: white;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #f0f0f0;
}

.card-header {
    padding: 1.5rem;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #fafbfc 0%, #ffffff 100%);
}

.card-title-section {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #e0e7ff 0%, #dbeafe 100%);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0f172a;
}

.status-badge {
    padding: 0.25rem 1rem;
    border-radius: 2rem;
    font-size: 0.7rem;
    font-weight: 700;
}

.status-badge.active {
    background: #dcfce7;
    color: #166534;
}

.view-all {
    color: #2563eb;
    font-size: 0.75rem;
    font-weight: 600;
    text-decoration: none;
}

.view-all:hover {
    text-decoration: underline;
}

/* Company Grid */
.company-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    padding: 1.5rem;
}

.info-field {
    background: #f9fafb;
    padding: 1rem;
    border-radius: 0.75rem;
}

.info-field label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
    font-weight: 600;
    display: block;
    margin-bottom: 0.5rem;
}

.info-value {
    font-size: 0.95rem;
    font-weight: 600;
    color: #0f172a;
}

/* Activities List */
.activities-list {
    padding: 1rem;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border-radius: 0.75rem;
    transition: background 0.2s ease;
}

.activity-item:hover {
    background: #f9fafb;
}

.activity-avatar {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #e0e7ff 0%, #dbeafe 100%);
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
}

.activity-content {
    flex: 1;
}

.activity-title {
    font-weight: 600;
    color: #0f172a;
    margin-bottom: 0.25rem;
}

.activity-time {
    font-size: 0.7rem;
    color: #64748b;
}

/* Quick Actions */
.quick-actions {
    background: white;
    border-radius: 1.5rem;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid #f0f0f0;
}

.quick-actions-header {
    margin-bottom: 1.5rem;
}

.quick-actions-header h2 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 0.25rem;
}

.quick-actions-header p {
    font-size: 0.875rem;
    color: #64748b;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
}

.action-card {
    background: #f9fafb;
    border-radius: 1rem;
    padding: 1rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.action-card:hover {
    background: white;
    border-color: #2563eb;
    transform: translateX(4px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.action-icon {
    width: 52px;
    height: 52px;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.action-info h3 {
    font-size: 0.9rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 0.25rem;
}

.action-info p {
    font-size: 0.7rem;
    color: #64748b;
}

/* Responsive */
@media (max-width: 1024px) {
    .dashboard-container {
        padding: 1rem;
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .dashboard-title {
        font-size: 1.75rem;
    }
}

@media (max-width: 768px) {
    .dashboard-header {
        flex-direction: column;
    }

    .header-right {
        width: 100%;
        justify-content: space-between;
    }

    .period-card {
        flex: 1;
    }

    .kpi-grid {
        gap: 1rem;
    }

    .actions-grid {
        grid-template-columns: 1fr;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.dashboard-container > * {
    animation: fadeInUp 0.4s ease forwards;
}

.kpi-card:nth-child(1) { animation-delay: 0.1s; }
.kpi-card:nth-child(2) { animation-delay: 0.2s; }
.kpi-card:nth-child(3) { animation-delay: 0.3s; }
.kpi-card:nth-child(4) { animation-delay: 0.4s; }

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>

@endsection
