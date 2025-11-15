## git reset

**Description:**

`git reset` resets your current branch to a specific state, allowing you to undo commits or local changes. It moves the branch pointer and optionally changes the staging area or working directory depending on the chosen reset mode.

**Goal / Purpose:**

- Undo commits or local changes.
- Move the branch pointer to a previous commit.
- Control how much of your work (committed, staged, unstaged) is reset.
- Use `-soft`, `-mixed`, and `-hard` to define the reset depth.

**Syntax:**

```bash
git reset [--soft | --mixed | --hard] <commit>

```

**Reset Modes Explained:**

| Mode | Effect on Commit History | Effect on Staging Area | Effect on Working Directory |
| --- | --- | --- | --- |
| `--soft` | Keeps all changes staged | **Staged** (index unchanged) | **Unchanged** |
| `--mixed` *(default)* | Moves HEAD, clears staging | **Unstaged** | **Unchanged** |
| `--hard` | Moves HEAD, clears staging | **Cleared** | **Discarded** (all changes lost) |

**Examples:**

Reset to the previous commit, keeping changes staged:

```bash
git reset --soft HEAD~1

```

Reset to the previous commit, keeping changes unstaged:

```bash
git reset --mixed HEAD~1

```

Reset to the previous commit, discarding all changes:

```bash
git reset --hard HEAD~1

```

Reset to a specific commit by hash:

```bash
git reset --hard a1b2c3d4

```

**Typical Use Case:**

Use `git reset` when you need to:

- Uncommit recent changes but keep the work for editing (`-soft` or `-mixed`).
- Completely discard unwanted local changes (`-hard`).
- Move your branch pointer to match a known stable commit.

**Concrete Examples of Behavior:**

Before reset (latest commits):

```
a1b2c3d4 Add new feature
9f8e7d6c Fix bug
1234567a Initial commit

```

1. `git reset --soft 9f8e7d6c`
    
    → The commit “Add new feature” is undone, but its changes remain staged (ready for recommit).
    
2. `git reset --mixed 9f8e7d6c`
    
    → The commit is undone, and changes appear as unstaged modifications.
    
3. `git reset --hard 9f8e7d6c`
    
    → The commit and its changes are completely removed from your working directory.
    

**Important:**

`git reset --hard` permanently deletes uncommitted changes — it cannot be undone easily. Use it with caution, especially on shared branches.