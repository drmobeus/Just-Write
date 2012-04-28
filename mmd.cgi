#!/bin/bash
echo "Content-type: text/plain"
echo ""
echo "$(/home/clocky/bin/multimarkdown /home/clocky/mmd/peg-multimarkdown/mmd-temp.txt)"
