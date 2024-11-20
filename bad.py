import time
import sys

def print_slow(str):
    for letter in str:
        sys.stdout.write(letter)
        sys.stdout.flush()
        time.sleep(0.05) #this is all for the typing simulation.

print("Input the username of the person you would like to accountcrack:")
ans = input()
print(ans)
print_slow("Beginning extraction of account credentials...")
time.sleep(3)
print_slow("""

Accessing database...""")
time.sleep(2)
print_slow("""

Extracting mySQL password file for selected username...""")

# HTML and CSS for styling the input prompt
html_input = """
<!DOCTYPE html>
<html>
<head>
<style>
.prompt {
    color: green;
}
</style>
</head>
<body>
<p class="prompt">Please enter the password for mySQL auth system:</p>
<input type="password" id="password">
</body>
</html>
"""

# Print HTML input prompt
print(html_input)

# Waiting for password input
input()

time.sleep(2)
print_slow("""

Accessing and creating a copy of the file...""")
time.sleep(3)
print_slow("""

Success. A copy of the password file will be emailed to you momentarily. Thank you for using Snap.""")
