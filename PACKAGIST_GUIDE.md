# 📦 Packagist Publishing Guide for vaultum/sdk

## Quick Setup (Recommended)

Packagist automatically syncs from GitHub - no manual publishing needed!

### 1. Login to Packagist

1. Go to: https://packagist.org
2. Click "Sign in with GitHub"
3. Authorize Packagist

### 2. Submit Your Package

1. Go to: https://packagist.org/packages/submit
2. Enter repository URL: `https://github.com/vaultum/sdk-php`
3. Click "Check"
4. Click "Submit"

### 3. Set Up Auto-Update Webhook

After submission, Packagist will show you a webhook URL:

1. Copy the webhook URL
2. Go to: https://github.com/vaultum/sdk-php/settings/hooks
3. Click "Add webhook"
4. Paste the Packagist URL
5. Content type: `application/json`
6. Select "Just the push event"
7. Click "Add webhook"

## That's It! ✅

Your package will be available at:
- **Packagist:** https://packagist.org/packages/vaultum/sdk
- **Installation:** `composer require vaultum/sdk`

## Version Management

### Creating a New Release

Packagist uses Git tags for versions:

```bash
# Update version in composer.json
# Then create a tag
git tag v1.0.1
git push origin v1.0.1

# Packagist auto-updates within minutes
```

### Semantic Versioning

- **Patch** (1.0.0 → 1.0.1): Bug fixes
- **Minor** (1.0.0 → 1.1.0): New features
- **Major** (1.0.0 → 2.0.0): Breaking changes

## Package URLs

Once published:
- **Packagist:** https://packagist.org/packages/vaultum/sdk
- **Statistics:** https://packagist.org/packages/vaultum/sdk/stats
- **Versions:** https://packagist.org/packages/vaultum/sdk#versions

## Testing Installation

```bash
# In a new project
composer require vaultum/sdk

# Or specific version
composer require vaultum/sdk:^1.0

# For development version
composer require vaultum/sdk:dev-main
```

## Best Practices

1. **Always tag releases**
   ```bash
   git tag v1.0.0
   git push --tags
   ```

2. **Update composer.json version**
   ```json
   {
     "version": "1.0.0"
   }
   ```

3. **Write good descriptions**
   - Clear package description
   - Comprehensive README
   - Document all public methods

4. **Use branch aliases** (optional)
   ```json
   "extra": {
     "branch-alias": {
       "dev-main": "1.0-dev"
     }
   }
   ```

## Badges for README

Add these to your README.md:

```markdown
[![Latest Stable Version](https://poser.pugx.org/vaultum/sdk/v)](https://packagist.org/packages/vaultum/sdk)
[![Total Downloads](https://poser.pugx.org/vaultum/sdk/downloads)](https://packagist.org/packages/vaultum/sdk)
[![License](https://poser.pugx.org/vaultum/sdk/license)](https://packagist.org/packages/vaultum/sdk)
[![PHP Version Require](https://poser.pugx.org/vaultum/sdk/require/php)](https://packagist.org/packages/vaultum/sdk)
```

## Troubleshooting

### Package not updating?
- Check webhook delivery at GitHub
- Manually update at: https://packagist.org/packages/vaultum/sdk
- Click "Update" button

### Name conflicts?
- Use vendor prefix: `vaultum/sdk-php`
- Or use different name: `vaultum/wallet-sdk`

### Missing composer.json?
- Ensure composer.json is in repository root
- Validate with: `composer validate`

## Security

- Never commit API keys
- Use `.gitattributes` to exclude tests from releases:
  ```
  /tests export-ignore
  /.github export-ignore
  /phpunit.xml export-ignore
  ```

## Quick Commands

```bash
# Validate composer.json
composer validate --strict

# Check what will be included
git archive --format=tar HEAD | tar -t

# Create new version
composer version patch
git push && git push --tags
```

---

## One-Line Setup

After Packagist account creation:
```bash
# Just submit the GitHub URL - that's it!
# https://github.com/vaultum/sdk-php
```

Packagist handles everything else automatically! 🎉
