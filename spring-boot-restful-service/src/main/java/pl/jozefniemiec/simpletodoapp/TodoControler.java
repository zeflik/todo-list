package pl.jozefniemiec.simpletodoapp;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
public class TodoControler {

    private final TodoRepository todoRepository;

    @Autowired
    public TodoControler(TodoRepository todoRepository) {
        this.todoRepository = todoRepository;
    }

    @GetMapping("/todo")
    public List<Todo> getTodos() {
        return todoRepository.findAll();
    }

    @PostMapping("/todo")
    public void saveTodo(@RequestBody Todo todo) {
        todoRepository.save(todo);
    }

    @GetMapping("/todo/{id}")
    public Todo getTodoById(@PathVariable Long id) {
        return todoRepository.findOne(id);
    }

    @GetMapping("/todo/description/{description}")
    public List<Todo> getTodoByDescription(@PathVariable String description) {
        return todoRepository.findByDescription(description);
    }

    @PutMapping(("/todo/{id}"))
    public void updateTodo(@PathVariable Long id, @RequestBody Todo todo) {
        Todo oldTodo = todoRepository.findOne(id);
        if (oldTodo != null) {
            oldTodo.setDescription(todo.getDescription());
            oldTodo.setComplete(todo.isComplete());
            todoRepository.save(oldTodo);
        }
    }

    @DeleteMapping("/todo/{id}")
    public void deleteTodo(@PathVariable Long id) {
        todoRepository.delete(id);
    }

}

