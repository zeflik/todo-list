package pl.jozefniemiec.simpletodoapp;

import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface TodoRepository extends CrudRepository<Todo, Long> {
    List<Todo> findAll();

    List<Todo> findByDescription(String description);
}
