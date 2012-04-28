#!/bin/bash
echo "Content-type: text/html"
echo ""
echo "<html><head><title>Bash as CGI"
echo "</title></head><body>"
echo "$(/home/clocky/bin/multimarkdown /home/clocky/mmd/peg-multimarkdown/mmd-temp.txt)"
echo "</body></html>"
