; General functional programming library to provide useful helpers for common patterns
; Implements several standard scheme primitives and some others that I have found useful

; Combine the elements of a list with a given separator to form a single string
(defun (join sep list)
  (cond
    [(empty? list) ""]
    [(atom? list) list]
    [(empty? (cdr list)) (car list)]
    [#t (concat (car list) sep (join sep (cdr list)))]))

; Call a function for each member of the list and return the list of results
(defun (map fn list)
  (cond
    [(empty? list) empty]
    [#t (cons (fn (car list))
              (map fn (cdr list)))]))

; Call a function for each member of a list but don't save results
(defun (apply-foreach fn list)
  (cond
    [(empty? list) empty]
    [#t (fn (car list))
        (apply-foreach fn (cdr list))]))
 
; Append an element to the input list
(defun (append l elem)
  (cond
    [(empty? l) (list elem)]
    [(empty? (cdr l)) (cons elem empty)]
    [#t (cons (car l) (append (cdr l) elem))]))

; Reduce a list to a single value using the combiner function provided
; which should take two arguments: init list
(defun (reduce fn init list)
  (cond
    [(empty? list) init]
    [#t (reduce fn (fn init (car list)) (cdr list))]))

; Function list export
(module-export
  join
  map
  apply-foreach
  append
  reduce)

