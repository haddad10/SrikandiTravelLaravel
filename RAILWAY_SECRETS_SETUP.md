# 🔐 Railway Secrets Setup Guide

## 📋 Setup Railway Secrets for Auto Deployment

### 1. **Get Railway Token**

1. Go to https://railway.app
2. Click on your profile → Account Settings
3. Go to "Developer Settings" → "Tokens"
4. Click "Create Token"
5. Give it a name: "Srikandi Travel Auto Deploy"
6. Copy the token (you won't see it again!)

### 2. **Get Railway Project ID**

1. Go to your Railway project
2. Click on "Settings" tab
3. Copy the "Project ID" (looks like: `abc123-def456-ghi789`)

### 3. **Add GitHub Secrets**

1. Go to https://github.com/haddad10/SrikandiTravelLaravel
2. Click "Settings" tab
3. Click "Secrets and variables" → "Actions"
4. Click "New repository secret"
5. Add these secrets:

#### **Secret 1: RAILWAY_TOKEN**
- **Name**: `RAILWAY_TOKEN`
- **Value**: Your Railway token from step 1

#### **Secret 2: RAILWAY_PROJECT_ID**
- **Name**: `RAILWAY_PROJECT_ID`
- **Value**: Your Railway project ID from step 2

### 4. **Test Auto Deployment**

After adding secrets, any push to main branch will trigger automatic deployment:

```bash
# Run the auto deploy script
./auto-deploy.ps1
```

## 🚀 **Auto Deployment Features**

### ✅ **GitHub Actions Workflow**
- Automatically deploys on push to main branch
- Uses Railway CLI for deployment
- Includes error handling and status reporting

### ✅ **PowerShell Script**
- One-click deployment
- Automatic git add, commit, and push
- Timestamped commit messages
- Error handling and status reporting

### ✅ **Batch Script**
- Simple Windows batch file
- Easy to run for non-technical users
- Clear status messages

## 📱 **What Gets Deployed**

### **Mobile Responsive Admin Panel**
- Dashboard mobile responsive
- Packages management mobile responsive
- Touch-friendly buttons and tables

### **Stable Background Images**
- CSS backgrounds configured
- Mobile portrait backgrounds
- Fallback gradients

### **Production Optimizations**
- Composer autoloader optimized
- Laravel cache optimized
- Routes and views cached

## 🎯 **Deployment Process**

1. **Run Script**: Execute `auto-deploy.ps1`
2. **Git Push**: Script pushes to GitHub
3. **GitHub Actions**: Automatically triggers
4. **Railway Deploy**: Railway receives the push
5. **Live Update**: Your app updates automatically

## 🔗 **Useful Links**

- **Railway Dashboard**: https://railway.app
- **GitHub Repository**: https://github.com/haddad10/SrikandiTravelLaravel
- **GitHub Actions**: https://github.com/haddad10/SrikandiTravelLaravel/actions

## 🚀 **Ready for Auto Deployment!**

Once secrets are configured, you can deploy with one command:

```powershell
# Run auto deploy
.\auto-deploy.ps1
```

**Your Srikandi Travel Laravel app will automatically deploy to Railway!** 🎉 